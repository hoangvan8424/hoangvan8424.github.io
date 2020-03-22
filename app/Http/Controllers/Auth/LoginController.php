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

        if (\Auth::attempt($credentials)) {
            return redirect()->route('home')->with('alert-success', 'Đăng nhập thành công! Chào mừng "'.$requestLogin->email.'" đến với PRIYOSHOP');
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('get.login')->with('alert-success', 'Đăng xuất thành công!');
    }

}
