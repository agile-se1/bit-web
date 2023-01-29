<?php

namespace App\Http\Controllers;

use App\Models\GeneralPresentation;
use App\Models\GeneralPresentationDecision;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class AdminController extends Controller
{

    public function index (){
        return view('admin.dashboard');
    }

    public function createUserByCSV(){
        return view('admin.createUserByCSV');
    }

    public function storeUserByCSV(Request $request){
        //Validation of file
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        //Reads files and saves rows in array
        try {
            $file = $request->file('file');
            $csvData = file_get_contents($file);
            $rows = explode("\r\n", $csvData);

            //Creates $header
            $header = array_shift($rows);
            $header = explode(';', $header);
        } catch (\Exception $e){
            return redirect()->back()->withErrors("The CSV format does not match the required format");
        }

        $userArray = [];
        //Loops throw each $rows and creates a new user (only data) for each $row
        foreach ($rows as $rowString){
            //Combines $row with $header
            $row = explode(';', $rowString);
            $row = array_combine($header, $row);

            //Validation
            try{
                if(trim($row['first_name']) == ""){
                    $row['first_name'] = null;
                }
                if(trim($row['surname']) == ""){
                    $row['surname'] = null;
                }

                if(key_exists('email', $row)){
                    if(trim($row['email']) == ""){
                        $row['email'] = null;
                    }
                    if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
                        $row['email'] = null;
                    }
                }
            } catch (\Exception $e){
                return redirect()->back()->withErrors("A required column is missing.");
            }

            //Add the hash
            try {
                $row['hash'] = UserController::createNewHash();
            } catch (\Exception $e){
                return redirect()->back()->withErrors("There was a problem with the User Hash. Please try again");
            }

            //If there is no email address, it will use the Iserv-Email address
            if(!key_exists('email', $row) || is_null($row['email'])){
                //Add the email address Format: max.mustermann@gym-mellendorf.de
                $row['email'] = $row['first_name'] . "." . $row['surname'] . "@gym-mellendorf.de";
                $row['email'] = strtolower($row['email']);
            }

            //Saves validated input in array
            $userArray[] = $row;
        }

        //Tries to save everything into the database or update the entry
        try{
            User::upsert($userArray, ['email'], ['first_name', 'surname']);
        } catch (\Exception $e){
            return redirect()->back()->withErrors("CSV file could not be converted to users. Please look for missing cells.");
        }

        return redirect()->back()->with('success', 'User created successfully');
    }

    public function indexUser(){
        $users = User::all();
        $userData = array();
        foreach($users as $user) {
            $userData[] = $this->getUserDecisions($user);
        }

        return view('admin.indexUser')->with('data', $userData);
    }

    public function editUser(User $user){
        $data = $this->getUserDecisions($user);

        return view('admin.editUser')->with('data', $data);
    }

    public function deleteUser (User $user){
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

    public function updateUser(User $user, Request $request){
        $request->validate([
            'firstName' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'generalPresentationDecision' => ['required', 'integer'],
            'professionalFieldDecision1' => ['required', 'integer'],
            'professionalFieldDecision2' => ['required', 'integer'],
            'generalPresentationDecisionOld' => ['required', 'integer'],
            'professionalFieldDecision1Old' => ['required', 'integer'],
            'professionalFieldDecision2Old' => ['required', 'integer'],
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

        //dd($request);
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
