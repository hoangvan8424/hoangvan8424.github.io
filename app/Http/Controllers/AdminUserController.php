<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUser;
use App\User;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{

    public function index()
    {
        $user = User::paginate(15);
        return view('admin.user.index', compact('user'));
    }

    public function update($id)
    {
        if($id) {
            $user = User::find($id);
            return view('admin.user.update', compact('user'));
        }
        return view('admin.404');
    }

    public function edit(RequestUser $requestUser, $id)
    {
        if($id) {
            $user = User::find($id);
            if ($requestUser->hasFile('avatar')) {
                $img = $requestUser->file('avatar');
                $fileName = $img->getClientOriginalName();
                $imagePath = public_path('') . '/img/product';
                $img->move($imagePath, $fileName);
            } else {
                $fileName = $requestUser->file('avatar_old');
            }
            $user->avatar = $fileName;
            $user->active = $requestUser->active ? User::PUBLIC_STATUS:User::PRIVATE_STATUS;
            $user->save();
            return redirect()
                ->action('AdminUserController@index')
                ->with('alert-success', 'Cập nhật người dùng thành công.');
        }
        return view('admin.404');
    }

    public function delete($id)
    {
        if($id)
        {
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('alert-success', 'Xóa người dùng thành công.');
        }
        return view('admin.404');
    }

    public function changeStatus($id)
    {
        if($id) {
            $user = User::find($id);
            $user->active = $user->active ? User::PRIVATE_STATUS : User::PUBLIC_STATUS;
            $user->save();
            return redirect()->back()->with('alert-success', 'Trạng thái người dùng đã được thay đổi.');
        }
        return view('admin.404');
    }
}
