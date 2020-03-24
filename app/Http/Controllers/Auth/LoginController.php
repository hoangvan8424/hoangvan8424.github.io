<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestLogin;

class LoginController extends FrontendController
{

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(RequestLogin $requestLogin)
    {
        $credentials = $requestLogin->only('email', 'password');
        $email = $requestLogin->email;
        $password = $requestLogin->password;
        if (\Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            return redirect()->route('home')->with('alert-success', 'Đăng nhập thành công! Chào mừng "'.$requestLogin->email.'" đến với PRIYOSHOP');
        }
        return redirect()->back()->with('alert-danger', 'Đăng nhập không thành công. Hãy thử lại!');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('get.login')->with('alert-success', 'Đăng xuất thành công!');
    }

}
