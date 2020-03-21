<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestRegister;

class RegisterController extends FrontendController
{


    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RequestRegister $requestRegister)
    {
        dd($requestRegister->all());
    }


}
