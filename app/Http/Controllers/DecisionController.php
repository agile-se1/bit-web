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
        //Get max count for the decision values
        $maxNumberOfGeneralPresentations = GeneralPresentation::all()->count();
        $maxNumberOfProfessionalFields = ProfessionalField::all()->count();

        //Validate the input
        $request->validate([
            'generalPresentation' => ['required', 'integer', 'between:'. 1 . ',' . $maxNumberOfGeneralPresentations],
            'professionalField1' => ['required', 'integer', 'between:'. 1 . ',' . $maxNumberOfProfessionalFields, 'different:professionalField2'],
            'professionalField2' => ['required', 'integer', 'between:'. 1 . ',' . $maxNumberOfProfessionalFields, 'different:professionalField1']
        ]);

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

        } catch (\Exception $e){
            return back()->withErrors('Couldn\'t save the decision');
        }

        return redirect('/decision');
    }
}
