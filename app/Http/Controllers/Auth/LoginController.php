<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AdminUser\AdminUserRoleHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLogin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(RequestLogin $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if ($this->checkRoles('active') === false) {
                return redirect()->route('logout');
            } else {
                $branch_id = Auth::user()->branch_id;
                if($this->checkRoles('managed_by_branches') === true) {
                    session()->put('branch_id', $branch_id);
                }

                return redirect()->route('home');
            }

        }
        return redirect()->route('login');

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        if(session()->has('branch_id')) {
            session()->forget('branch_id');
        }
        return redirect()->route('login');
    }
}
