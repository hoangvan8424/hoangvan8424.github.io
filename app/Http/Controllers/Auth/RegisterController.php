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
        $user->password = bcrypt($requestRegister->re_password);
        $user->save();
        if($user->id) {
            return redirect()->route('get.login')->with('alert-success', 'Đăng ký tài khoản thành công, hãy đăng nhập!.');
        }
        return redirect()->back()->with('alert-danger', 'Đăng ký tài khoản thất bại, hãy thử lại!');
    }


}
