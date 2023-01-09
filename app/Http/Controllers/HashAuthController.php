<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Auth;

class HashAuthController extends Controller
{
    public function hashLogin(String $hash){
        //Check if there is a value
        Validator::make(['hash' => $hash], [
            'hash' => ['required', 'size:14']
        ])->validate();

        //Get the user from the database
        $user = User::where('hash', $hash)->first();

        //Check if the user exists
        if (empty($user)) {
            $this->logout();
            return back()->withErrors('User doesn\'t exist');
        }

        //Tries to authenticate
        if(Auth::loginUsingId($user->id)){
            //Success
            return redirect('/showAuthData');
        }

        $this->logout();
        return back()->withErrors('Couldn\'t authenticate');
    }

    public function logout (){
        Session::flush();
        Auth::logout();

        return redirect('/showAuthData');
    }

    public function showNoticeToLogin (){
        return view('login.noticeToLogin');
    }
}
