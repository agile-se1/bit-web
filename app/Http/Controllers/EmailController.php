<?php

namespace App\Http\Controllers;

use App\Mail\LoginLinkMail;
use App\Mail\ReminderEmailForNextBITMail;
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



    //Single Emails
    private function sendLoginLinkEmail(User $user){
        Mail::to($user->email)->send(new LoginLinkMail($user));
    }

    private function sendReminderEmailEmailForNextBIT(User $user){
        Mail::to($user->email)->send(new ReminderEmailForNextBITMail($user));
    }
}
