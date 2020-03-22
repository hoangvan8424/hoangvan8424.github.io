<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestRegister;
use App\User;

class RegisterController extends FrontendController
{


    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RequestRegister $requestRegister)
    {
        $user = new User();
        $user->name = $requestRegister->name;
        $user->email = $requestRegister->email;

    }


}
