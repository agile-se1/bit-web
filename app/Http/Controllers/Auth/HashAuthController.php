<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Session;

class HashAuthController extends Controller
{

    public function __construct(){
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * @throws ValidationException
     */
    public function hashLogin(String $hash): Redirector|Application|RedirectResponse
    {
        if(Auth::check()){
            return redirect('/decision');
        }
        
        //Check if there is a value
        Validator::make(['hash' => $hash], [
            'hash' => ['required', 'size:14']
        ])->validate();

        //Get the user from the database
        $user = User::where(['hash' => $hash])->first();

        //Check if the user exists
        if (empty($user)) {
            $this->logout();
            return back()->withErrors('Es wurde kein passender Benutzer gefunden.');
        }

        //Tries to authenticate
        if(Auth::loginUsingId($user->id)){
            //Success
            return redirect('/decision');
        }

        $this->logout();
        return back()->withErrors('Der Benutzer konnte nicht verifiziert werden');
    }

    public function logout (): Redirector|Application|RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect('/home');
    }

    public function showNoticeToLogin (): Factory|View|Application
    {
        return view('login.noticeToLogin');
    }
}
