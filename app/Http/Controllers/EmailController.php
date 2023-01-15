<?php

namespace App\Http\Controllers;

use App\Mail\LoginLinkMail;
use App\Models\User;
use Illuminate\Http\Request;
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

    //Single Emails
    private function sendLoginLinkEmail(User $user){
        Mail::to($user->email)->send(new LoginLinkMail($user));
    }
}
