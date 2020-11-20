<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $data = User::all();
        return view('admin.user.list', compact('data'));
    }

    public function showUpdateForm($id) {
        $user = User::findOrFail($id);

        return view('admin.user.update', compact('user'));
    }

    public function update($id, UserRequest $request) {
        $user = User::findOrFail($id);
        $user->name = $request->name;

        $avatarName = "";
        if($request->has('avatar')) {
            $img = $request->file('avatar');
            $avatarName = 'a_' . rand() . '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/avatar/';
            $img->move($imgPath, $avatarName);
        }

        $user->avatar = $avatarName;
        $user->save();

        return redirect()->route('user.list')->with('alert-success', 'Sửa người dùng thành công');
    }
}
