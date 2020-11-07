<?php

namespace App\Http\Controllers;

use App\Helpers\AdminUser\AdminUserRoleHelper;
use App\Http\Requests\RequestUpdateUser;
use App\Http\Requests\RequestUser;
use App\Mail\ActiveAccountMail;
use App\Model\Branch;
use App\Model\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $user->role = $request->position ? $request->position : 3;

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
            'user'      => $user,
            'role'      => AdminUserRoleHelper::rolesArray($user->first()->todo)
        ];


        return view('admin.user.update', $data);
    }

    public function update(Request $request, $id) {

        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $user = User::findOrFail($id);

        $roles = AdminUserRoleHelper::updateAccountRole($request->input());

        $update = $user->update(array(
            'name' =>  $request->name,
            'branch_id' => $request->branch,
            'department_id' => $request->department,
            'sex'  => $request->sex,
            'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
            'role' => $request->position ? $request->position : 3,
            'todo' => $roles
        ));

        if($update) {
            $deRole = json_decode($roles,true);
            if(intval($deRole['role_active']) === 1) {
                Mail::to($user->first()->email)->send(new ActiveAccountMail($request->input('name')));
            }

            $request->session()->put('update_status',true);
            return redirect()->route('user.list')->with('alert-success', 'Cập nhật thành công.');
        } else {
            $request->session()->put('update_status',false);
            return redirect()->back();
        }
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
