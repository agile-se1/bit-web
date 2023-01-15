<?php

namespace App\Http\Controllers;

use App\Mail\decisionReminderMail;
use App\Mail\LoginLinkMail;
use App\Mail\ReminderEmailForNextBITMail;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    //Test functions
    public function sendTestLoginEmail(){
        $user = User::where('id', 1)->first();

        $this->sendLoginLinkEmail($user);
    }

    //Routes
    public function sendLoginLinkEmailToAllUsers (){
        $users = User::all();
        foreach($users as $user) {
           $this->sendLoginLinkEmail($user);
        }
    }

    public function sendReminderEmailForNextBITToAllUsers(){
        $users = User::all();
        foreach($users as $user) {
            $this->sendReminderEmailEmailForNextBIT($user);
        }
    }

    public function sendDecisionReminderMailToAllUsers(){
        $users = User::all();
        foreach($users as $user) {
            //Checks if the user already made their decision
            if(!$this->userMadeDecision($user)){
                $this->sendDecisionReminderMail($user);
            }
        }
    }



    //Single Emails
    private function sendLoginLinkEmail(User $user){
        Mail::to($user->email)->send(new LoginLinkMail($user));
    }

    private function sendReminderEmailEmailForNextBIT(User $user){
        Mail::to($user->email)->send(new ReminderEmailForNextBITMail($user));
    }

    private function sendDecisionReminderMail(User $user){
        Mail::to($user->email)->send(new DecisionReminderMail($user));
    }

    //Helper
    private function userMadeDecision(User $user):bool{
        //Tries to fetch a user decision. If it can find one entry, the user made his complete decision, because it is not possible to just set a single decision
        try {
            $professionalFieldDecision1 = ProfessionalFieldDecision::where('user_id', $user->id)->first();
            ProfessionalField::where('id', $professionalFieldDecision1->professional_field_id)->first();
            return true;
        } catch (\Throwable $e){
            return false;
        }

    }
}
