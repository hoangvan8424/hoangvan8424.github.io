<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AdminUser\AdminUserRoleHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRegister;
use App\Mail\WelcomeUserMail;
use App\Model\Branch;
use App\Model\Department;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    /**
     * @param RequestRegister $request
     * @return mixed
     */
    protected function create(RequestRegister $request)
    {
        $roles = AdminUserRoleHelper::setupAccountUser();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'branch_id' => $request->branch,
            'department_id' => $request->department,
            'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
            'sex' => $request->sex,
            'todo'  => $roles
        ]);

        Mail::to($request->input('email'))->send(new WelcomeUserMail($request->input('name')));

        return redirect()->route('login')->with("alert-success", "Đăng ký tài khoản thành công. Tài khoản của bạn đang đợi admin kích hoạt.");
    }

    public function showRegistrationForm()
    {
        $branch = Branch::where([
            'active' => true,
        ])->get();

        $department = Department::where([
            'active' => true
        ])->get();
        return view('auth.register', compact('branch', 'department'));
    }
}
