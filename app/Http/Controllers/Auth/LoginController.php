<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestRegister;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends FrontendController
{

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(RequestRegister $requestRegister)
    {
        dd($requestRegister->all());
    }

}
