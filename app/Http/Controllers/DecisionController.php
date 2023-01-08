<?php

namespace App\Http\Controllers;

use App\Models\GeneralPresentation;
use App\Models\ProfessionalField;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function show(){
        return view('decision.decision', [
            'professionalFields' => ProfessionalField::all(),
            'generalPresentations' => GeneralPresentation::all()
        ]);
    }
}
