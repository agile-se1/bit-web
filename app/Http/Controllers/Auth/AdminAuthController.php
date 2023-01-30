<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Session;


class AdminAuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLogin(): Factory|View|Application
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request): Redirector|Application|RedirectResponse
    {
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
            return back()->withErrors('Admin doesn\'t exist');
        }

        //Tries to authenticate
        if(Auth::guard('admin')->loginUsingId($admin->id)){
            //Success
            return redirect('/admin/dashboard');
        }

        return back()->withErrors('Could not lock in');
    }

    public function logout (): Redirector|Application|RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect('/admin/login');
    }
}
