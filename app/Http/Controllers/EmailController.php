<?php

namespace App\Http\Controllers;

use App\Mail\DecisionReminderMail;
use App\Mail\LoginLinkMail;
use App\Mail\BeforeBITMail;
use App\Models\ProfessionalFieldDecision;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //Routes
    //Send a mail with a login link to all users
    public function sendLoginLinkMailToAllUsers (): RedirectResponse
    {
        $users = User::all();
        foreach($users as $user) {
           $this->sendLoginLinkMail($user);
        }

        return redirect()->back()->with('message', 'Emails send');
    }

    //Send a mail before the next BIT to remind the user for the date and also about his decision
    public function sendBeforeBITMailToAllUsers(): RedirectResponse
    {
        $users = User::all();
        foreach($users as $user) {
            $this->sendBeforeBITMail($user);
        }

        return redirect()->back()->with('message', 'Emails send');
    }

    //Send a mail to all users, who doesn't make a decision
    public function sendDecisionReminderMailToAllUsers(): RedirectResponse
    {
        $users = User::all();
        foreach($users as $user) {
            //Checks if the user already made their decision
            if(!$this->userMadeDecision($user)){
                $this->sendDecisionReminderMail($user);
            }
        }

        return redirect()->back()->with('message', 'Emails send');
    }

    //Get new LoginLink by first_name and surname
    public function sendNewLoginLinkMailByFirstAndSurname (Request $request){
        //Tries to get a user from the database
        $user = User::where([
            ['first_name', '=', $request->first_name],
            ['surname', '=', $request->surname]
        ])->first();

        //Checks if the user exists, if so, send an email
        if(isset($user)){
            $this->sendLoginLinkMail($user);
        }
    }

    public function sendNewLoginLinkToUser(User $user){
        $this->sendLoginLinkMail($user);

        return redirect('/admin/user')->with('message', 'Email send');
    }

    //Single Mail Sender
    public function sendLoginLinkMail(User $user){
        Mail::to($user->email)->send(new LoginLinkMail($user));
    }

    private function sendBeforeBITMail(User $user){
        Mail::to($user->email)->send(new BeforeBITMail($user));
    }

    private function sendDecisionReminderMail(User $user){
        Mail::to($user->email)->send(new DecisionReminderMail($user));
    }

    //Helper functions
    private function userMadeDecision(User $user):bool{
        //If the system can find an entry in professionalFieldDecision, the system knows that the user made a complete decision, because it is not possible to just select one professionalField
        $anyProfessionalFieldDecision = ProfessionalFieldDecision::where('user_id', $user->id)->first();
        if(isset($anyProfessionalFieldDecision)){
            return true;
        }

        return false;
    }
}
