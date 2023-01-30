<?php

namespace App\Http\Controllers;

use App\Models\GeneralPresentationDecision;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserManipulationController extends Controller
{
    public function index(){
        $users = User::all();
        $userData = array();
        foreach($users as $user) {
            $userData[] = $this->getUserDecisions($user);
        }

        return view('admin.indexUser')->with('data', $userData);
    }

    public function edit(User $user){
        $data = $this->getUserDecisions($user);

        return view('admin.editUser')->with('data', $data);
    }

    public function delete (User $user){
        try{
            DB::beginTransaction();

            //Get Data from decision
            $data = $this->getUserDecisions($user);

            if(
                $data['professionalFieldDecision1'] != null ||
                $data['professionalFieldDecision2'] != null
            ){
                //Delete Decision
                GeneralPresentationDecision::where('user_id', $user->id)->delete();
                ProfessionalFieldDecision::where('user_id', $user->id)->delete();

                //Change Participation count
                $professionalField1 = ProfessionalField::where('id', $data['professionalFieldDecision1'])->first();
                $professionalField1->current_count--;
                $professionalField1->save();

                $professionalField2 = ProfessionalField::where('id', $data['professionalFieldDecision2'])->first();
                $professionalField2->current_count--;
                $professionalField2->save();
            }

            $user->delete();
            DB::commit();
        } catch (\Throwable $e){
            DB::rollBack();
            return back()->withErrors('Couldn\'t delete the user');
        }

        return redirect('/admin/user')->with('message', 'Successfully deleted');
    }

    public function update (User $user, Request $request){

        $request->validate([
            'firstName' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email'],
        ]);

        //Check, if UserData is changed
        if(
            $user->firstName != $request['firstName'] ||
            $user->surname != $request['surname'] ||
            $user->email != $request['email']
        ) {
            $user->first_name = $request['firstName'];
            $user->surname = $request['surname'];
            $user->email = $request['email'];

            $user->save();
        }

        //Check if the Decision data is changed
        if(
            $request['generalPresentationDecision'] != $request['generalPresentationDecisionOld'] ||
            $request['professionalFieldDecision1'] != $request['professionalFieldDecision1Old'] ||
            $request['professionalFieldDecision2'] != $request['professionalFieldDecision2Old']
        ) {
            try {
                (new DecisionController)->updateUserDecision($user->id, $request['generalPresentationDecision'], $request['professionalFieldDecision1'], $request['professionalFieldDecision2']);
            } catch (\Throwable $e){
                return redirect()->back()->withErrors($e->getMessage());
            }
        }

        return redirect('/admin/user')->with('message', 'Erfolgreich geändert');
    }

    public function create (){
        return view('admin.createUser');
    }

    public function store (Request $request){
        $request->validate([
            'firstName' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email']
        ]);

        try {
            User::create([
                'first_name' => $request['firstName'],
                'surname' => $request['surname'],
                'email' =>  $request['email'],
                'hash' => UserController::createNewHash()
            ]);
        } catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect('/admin/dashboard')->with('message', 'User created');
    }

    //Helper
    private function getUserDecisions(User $user){
        $data = array();
        $data['user'] = $user;
        $data['generalPresentationDecisionDate'] = null;
        $data['professionalFieldDecision1Date'] = null;
        $data['professionalFieldDecision2Date'] = null;
        $data['generalPresentationDecision'] = null;
        $data['professionalFieldDecision1'] = null;
        $data['professionalFieldDecision2'] = null;

        //Fetch all data from the database
        $generalPresentationDecision = GeneralPresentationDecision::where('user_id', $user->id)->first();
        if($generalPresentationDecision != null){
            $data['generalPresentationDecisionDate'] = $generalPresentationDecision->updated_at;
            $data['generalPresentationDecision'] = $generalPresentationDecision->general_presentation_id;
        }

        $professionalFieldDecision1 = ProfessionalFieldDecision::where('user_id', $user->id)->orderBy('id', 'asc')->first();
        if($professionalFieldDecision1 != null){
            $data['professionalFieldDecision1Date'] = $professionalFieldDecision1->updated_at;
            $data['professionalFieldDecision1'] = $professionalFieldDecision1->professional_field_id;
        }

        $professionalFieldDecision2 = ProfessionalFieldDecision::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        if($professionalFieldDecision2 != null){
            $data['professionalFieldDecision2Date'] = $professionalFieldDecision2->updated_at;
            $data['professionalFieldDecision2'] = $professionalFieldDecision2->professional_field_id;
        }

        return $data;
    }
}
