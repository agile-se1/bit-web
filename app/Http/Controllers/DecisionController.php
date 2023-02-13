<?php

namespace App\Http\Controllers;

use App\Models\GeneralPresentation;
use App\Models\GeneralPresentationDecision;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Response;
use Inertia\ResponseFactory;
use Throwable;

class DecisionController extends Controller
{
    public function __construct(
        private ResponseFactory $responseFactory,
    )
    {
    }

    public function index(): Response
    {
        return $this->responseFactory->render('ProfessionalFieldDecision', [
            'professional_fields' => ProfessionalField::orderBy('id')->get(),
            'general_presentations' => GeneralPresentation::orderBy('id')->get()

        ]);
    }


    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $this->requestValidation($request);

        //Checks if the user already made a decision
        if (
            !is_null(GeneralPresentationDecision::where('user_id', Auth::id())->first()) ||
            !is_null(ProfessionalFieldDecision::where('user_id', Auth::id())->first())
        ) {
            return back()->withErrors('Du hast bereits eine Auswahl getroffen.');
        }

        //Save everything in the database
        try{
            DB::beginTransaction();
            //Save models in database
            GeneralPresentationDecision::create([
                'user_id' => Auth::id(),
                'general_presentation_id' => $request['generalPresentation'],
            ]);

            ProfessionalFieldDecision::create([
                'user_id' => Auth::id(),
                'professional_field_id' => $request['professionalField1']
            ]);

            ProfessionalFieldDecision::create([
                'user_id' => Auth::id(),
                'professional_field_id' => $request['professionalField2']
            ]);

            //Change the participant count in database
            $this->changeProfessionalFieldCount($request['professionalField1'], true);
            $this->changeProfessionalFieldCount($request['professionalField2'], true);

            DB::commit();
        } catch (Throwable){
            DB::rollBack();
            return back()->withErrors('Die Auswahl konnte nicht gespeichert werden.');
        }

        return redirect('/decision');
    }

    public function update (Request $request): Redirector|Application|RedirectResponse
    {
        $this->requestValidation($request);

        try {
            $this->updateUserDecision(Auth::id(), $request['generalPresentation'], $request['professionalField1'], $request['professionalField2']);
        } catch (Exception){
            return back()->withErrors('Die Auswahl konnte nicht geändert werden.');
        }

        return redirect('/decision');
    }

    //Helper

    /**
     * @throws Exception
     */
    public function updateUserDecision (int $userId, int $generalPresentationInput, int $professionalField1Input, int $professionalField2Input){
        //Get all data from the database and save the new values
        try{
            DB::beginTransaction();

            //Update the generalPresentationDecision
            $generalPresentationDecision = GeneralPresentationDecision::where('user_id', $userId)->first();
            $generalPresentationDecision->general_presentation_id = $generalPresentationInput;
            $generalPresentationDecision->save();

            //Get professionalFieldDecisions from database
            $professionalFieldDecision1 = ProfessionalFieldDecision::where('user_id', $userId)->orderBy('id', 'asc')->first();
            $professionalFieldDecision2 = ProfessionalFieldDecision::where('user_id', $userId)->orderBy('id', 'desc')->first();

            //Get professionalFields form database
            $professionalField1 = ProfessionalField::where('id', $professionalFieldDecision1->professional_field_id)->first();
            $professionalField2 = ProfessionalField::where('id', $professionalFieldDecision2->professional_field_id)->first();

            //Reduce the participantCounts
            $this->changeProfessionalFieldCount($professionalField1->id, false);
            $this->changeProfessionalFieldCount($professionalField2->id, false);

            //Add the new professionalFieldDecisions
            $professionalFieldDecision1->professional_field_id = $professionalField1Input;
            $professionalFieldDecision2->professional_field_id = $professionalField2Input;

            //Get new professionalFields from database
            $professionalField1 = ProfessionalField::where('id', $professionalFieldDecision1->professional_field_id)->first();
            $professionalField2 = ProfessionalField::where('id', $professionalFieldDecision2->professional_field_id)->first();

            //Add the new participantCount
            $this->changeProfessionalFieldCount($professionalField1->id, true);
            $this->changeProfessionalFieldCount($professionalField2->id, true);

            //Save the updated professionalFieldDecision
            $professionalFieldDecision1->save();
            $professionalFieldDecision2->save();

            DB::commit();
        } catch (Throwable){
            DB::rollBack();
            throw new Exception();
        }
    }

    private function requestValidation(Request $request): void
    {
        //Get max count for the decision values
        $maxNumberOfGeneralPresentations = GeneralPresentation::all()->count();
        $maxNumberOfProfessionalFields = ProfessionalField::all()->count();

        //Validate the input
        $request->validate([
            'generalPresentation' => ['required', 'integer', 'between:' . 1 . ',' . $maxNumberOfGeneralPresentations],
            'professionalField1' => ['required', 'integer', 'between:' . 1 . ',' . $maxNumberOfProfessionalFields, 'different:professionalField2'],
            'professionalField2' => ['required', 'integer', 'between:' . 1 . ',' . $maxNumberOfProfessionalFields, 'different:professionalField1']
        ]);
    }

    /**
     * @throws Exception
     */
    private function changeProfessionalFieldCount(int $id, bool $plus): void
    {
        //Get professionalField from database
        $professionalField = ProfessionalField::where('id', $id)->first();

        //Change count
        if($plus){
            $professionalField->current_count++;
        } else {
            $professionalField->current_count--;
        }

        //Checks if the new count is allowed
        if(!$this->checkIfParticipantCountIsAllowed($professionalField)){
            throw new Exception('Die Teilnehmerzahl ist nicht in dem erlaubten Rahmen.');
        }

        //Save in database
        $professionalField->save();
    }

    //Checks if the participant count is in the max range
    private function checkIfParticipantCountIsAllowed(ProfessionalField $professionalField): bool
    {
        if(
            $professionalField->current_count > $professionalField->max_count ||
            $professionalField->current_count < 0
        ){
            return false;
        }

        return true;
    }
}
