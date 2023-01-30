<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\UserController;
use App\Models\GeneralPresentationDecision;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Throwable;

class AdminUserManipulationController extends Controller
{
    public function index(): Factory|View|Application
    {
        $users = User::all();
        $userData = array();
        foreach($users as $user) {
            $userData[] = $this->getUserDecisions($user);
        }

        return view('admin.indexUser')->with('data', $userData);
    }

    public function edit(User $user): Factory|View|Application
    {
        $data = $this->getUserDecisions($user);

        return view('admin.editUser')->with('data', $data);
    }

    public function delete (User $user): Redirector|RedirectResponse|Application
    {
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
        } catch (Throwable){
            DB::rollBack();
            return back()->withErrors('Der User konnte nicht gelöscht werden.');
        }

        return redirect('/admin/user')->with('message', 'Der User wurde gelöscht.');
    }

    public function update (User $user, Request $request): Redirector|RedirectResponse|Application
    {
        $request->validate([
            'firstName' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email'],
        ]);

        //Check, if UserData is changed
        if(
            $user->first_name != $request['firstName'] ||
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
            } catch (Throwable){
                return redirect()->back()->withErrors("Die Auswahl des Users konnte nicht geändert werden.");
            }
        }

        return redirect('/admin/user')->with('message', 'Der User wurde erfolgreich geändert.');
    }

    public function create (): Factory|View|Application
    {
        return view('admin.createUser');
    }

    public function store (Request $request): Redirector|RedirectResponse|Application
    {
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
        } catch (Throwable){
            return redirect()->back()->withErrors("Der User konnte nicht gespeichert werden.");
        }

        return redirect('/admin/dashboard')->with('message', 'Der User wurde erstellt.');
    }

    //Helper
    private function getUserDecisions(User $user): array
    {
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
