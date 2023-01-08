<?php

namespace App\Http\Controllers;

use App\Models\GeneralPresentation;
use App\Models\GeneralPresentationDecision;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DecisionController extends Controller
{
    public function index(){
        return view('decision.decision', [
            'professionalFields' => ProfessionalField::all(),
            'generalPresentations' => GeneralPresentation::all()
        ]);
    }

    public function store(Request $request){

        $this->requestValidation($request);

        //Checks if the user already made a decision
        if(
            !is_null(GeneralPresentationDecision::where('user_id', Auth::id())->first()) ||
            !is_null(ProfessionalFieldDecision::where('user_id', Auth::id())->first())
        ){
            return back()->withErrors('User already set a decision');
        }

        //Save everything in the database
        try{
            GeneralPresentationDecision::create([
                'user_id' => Auth::id(),
                'general_presentation_id' => $request->generalPresentation,
            ]);

            ProfessionalFieldDecision::create([
                'user_id' => Auth::id(),
                'professional_field_id' => $request->professionalField1
            ]);

            ProfessionalFieldDecision::create([
                'user_id' => Auth::id(),
                'professional_field_id' => $request->professionalField2
            ]);

        } catch (\Throwable $e){
            return back()->withErrors('Couldn\'t save the decision');
        }

        return redirect('/decision');
    }

    public function update (Request $request){
        $this->requestValidation($request);

        //Get all data from the database and save the new values
        try{
            $generalPresentationDecision = GeneralPresentationDecision::where('user_id', Auth::id())->first();
            $generalPresentationDecision->general_presentation_id = $request->generalPresentation;
            $generalPresentationDecision->save();

            $professionalFieldDecision1 = ProfessionalFieldDecision::where('user_id', Auth::id())->first();
            $professionalFieldDecision1->professional_field_id = $request->professionalField1;
            $professionalFieldDecision1->save();

            $professionalFieldDecision2 = ProfessionalFieldDecision::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
            $professionalFieldDecision2->professional_field_id = $request->professionalField2;
            $professionalFieldDecision2->save();
        } catch (\Throwable $e){
            return back()->withErrors('' . $e);
        }

        return redirect('/decision');
    }

    //Helper
    //Validation
    private function requestValidation(Request $request){
        //Get max count for the decision values
        $maxNumberOfGeneralPresentations = GeneralPresentation::all()->count();
        $maxNumberOfProfessionalFields = ProfessionalField::all()->count();

        //Validate the input
        return $request->validate([
            'generalPresentation' => ['required', 'integer', 'between:'. 1 . ',' . $maxNumberOfGeneralPresentations],
            'professionalField1' => ['required', 'integer', 'between:'. 1 . ',' . $maxNumberOfProfessionalFields, 'different:professionalField2'],
            'professionalField2' => ['required', 'integer', 'between:'. 1 . ',' . $maxNumberOfProfessionalFields, 'different:professionalField1']
        ]);
    }
}
