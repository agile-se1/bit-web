<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class AdminAuthController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLogin(){
        return view('admin.login');
    }

    public function adminLogin(Request $request){
        $this->validate($request, [
            'username' => ['required'],
            'password' => ['required', 'min:6'],
        ]);

        $admin = Admin::where([
            ['username', $request->username],
            ['password', $request->password],
        ])->first();

        //Check if the user exists
        if (empty($admin)) {
            $this->logout();
            return back()->withErrors('User doesn\'t exist');
        }

        //Tries to authenticate
        if(Auth::guard('admin')->loginUsingId($admin->id)){
            //Success

            //dd(Auth::guard('admin')->id());
            return redirect('/admin/dashboard');
        }

        return back()->withErrors('Error');
    }

    public function logout (){
        Session::flush();
        Auth::logout();

        return redirect('/admin/login');
    }
}
