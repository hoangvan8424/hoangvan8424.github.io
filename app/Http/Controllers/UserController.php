<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUpdateUser;
use App\Http\Requests\RequestUser;
use App\Model\Branch;
use App\Model\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $data = User::all();
        return view('admin.user.list', compact('data'));
    }

    public function add() {
        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $branch = Branch::where([
            'active' => 1
        ])->get();

        $department = Department::where([
            'active' => 1,
        ])->get();

        $data = [
            'branch'    => $branch,
            'department' => $department,
        ];


        return view('admin.user.add', $data);
    }

    public function save(RequestUser $request) {
        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->branch_id = $request->branch;
        $user->department_id = $request->department;
        $user->avatar = 'public/images/default/avatar.jpg';
        $user->sex = $request->sex;
        $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));

        $user->save();

        return redirect()->route('user.list')->with('alert-success', 'Thêm nhân viên thành công');
    }

    public function showUpdateForm($id) {

        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $user = User::findOrFail($id);

        $branch = Branch::where([
            'active' => 1
        ])->get();

        $department = Department::where([
            'active' => 1,
        ])->get();

        $data = [
            'branch'    => $branch,
            'department' => $department,
            'user'      => $user
        ];


        return view('admin.user.update', $data);
    }

    public function update(RequestUpdateUser $request, $id) {

        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->branch_id = $request->branch;
        $user->department_id = $request->department;
        $user->sex = $request->sex;
        $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));

        $user->save();

        return redirect()->route('user.list')->with('alert-success', 'Sửa nhân viên thành công');
    }

    public function delete($id) {
        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.list')->with('alert-success', 'Xóa nhân viên thành công');
    }
}
