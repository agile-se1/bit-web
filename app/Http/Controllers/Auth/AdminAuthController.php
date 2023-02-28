<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;
use Session;


class AdminAuthController extends Controller
{
    public function __construct(
        private ResponseFactory $responseFactory,
    )
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');

    }

    public function showAdminLogin(): Response
    {
        return $this->responseFactory->render('AdminLogin');
    }

    /**
     * @throws ValidationException
     */
    public function adminLogin(Request $request): Response|RedirectResponse
    {
        $this->validate($request, [
            'username' => ['required'],
            'password' => ['required', 'min:6'],
        ]);

        $admin = Admin::where([
            ['username', $request['username']],
            ['password', $request['password']],
        ])->first();

        //Check if the user exists
        if (empty($admin)) {
            $this->logout();
            redirect()->back()->withErrors('Der Admin-Account existiert nicht.');
        }

        //Tries to authenticate
        try {
            if(Auth::guard('admin')->loginUsingId($admin->id)){
                //Success
                return $this->responseFactory->render('AdminDashboard');
            }
        } catch (\Throwable $e){
            return back()->withErrors('Sie konnten sich nicht verifizieren.');
        }

        return back()->withErrors('Sie konnten sich nicht verifizieren.');
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect()->to('/admin/login');
    }
}
