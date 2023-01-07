<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class HashAuthController extends Controller
{
    public function hashLogin(String $hash){
        //Check if there is a value
        if(trim($hash) == "" || empty($hash)){
            $this->logout();
            return redirect('/showAuthData')->withErrors('No token provided');
        }

        //Get the user from the database
        $user = User::where('hash', '=', $hash)->first();

        //Check if the user exists
        if (empty($user)) {
            $this->logout();
            return redirect('/showAuthData')->withErrors('User doesn\'t exist');
        }

        //Tries to authenticate
        if(Auth::loginUsingId($user->id)){
            return redirect('/showAuthData');
        }

        $this->logout();
        return redirect('/showAuthData')->withErrors('Couldn\'t authenticate');
    }

    public function logout (){
        Session::flush();
        Auth::logout();

        return Redirect('/showAuthData');
    }

    public function showNoticeToLogin (){
        return view('login.noticeToLogin');
    }
}
