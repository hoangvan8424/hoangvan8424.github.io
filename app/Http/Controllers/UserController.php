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

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id'        => $branch_id,
                    'active'    => true,
                ])->get();
                $data = User::where([
                    'branch_id' => $branch_id,
                ])->get();

                return view('admin.user.list', compact('data'));
            }
        }

        $data = User::all();
        return view('admin.user.list', compact('data'));
    }

    public function add() {
        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();
                $department = Department::where([
                    ['active', '=', 1],
                    ['name', 'not like', '%Nhân sự%'],
                ])->get();

                $data = [
                    'branch'    => $branch,
                    'department' => $department,
                    'status'     => false
                ];

                return view('admin.user.add', $data);
            }
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
            'status'    => true
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

        $roles = "[]";

        if($request->position == 0 ) {
            $roles = AdminUserRoleHelper::setupAccountAdmin();
        } else if($request->position == 1) {
            $roles = AdminUserRoleHelper::setupAccountVicePresident();
        } else if($request->position == 2) {
            $roles = AdminUserRoleHelper::setupAccountManager();
        } else if($request->position == 3 || $request->position == null) {
            $roles = AdminUserRoleHelper::setUpAccountUser();
        }

        $user->role = $request->position != null ? $request->position : 3;
        $user->todo = $roles;

        $user->save();

        return redirect()->route('user.list')->with('alert-success', 'Thêm nhân viên thành công');
    }

    public function showUpdateForm($id) {

        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $user = User::findOrFail($id);

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {

                if($user->branch_id != $branch_id) {
                    return redirect()->route('user.list')->with('alert-error', 'Nhân viên không tồn tại');
                }

                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();
                $department = Department::where([
                    ['active', '=', 1],
                    ['name', 'not like', '%Nhân sự%'],
                ])->get();

                $data = [
                    'branch'        => $branch,
                    'department'    => $department,
                    'user'          => $user,
                    'role'          => AdminUserRoleHelper::rolesArray($user->todo),
                ];

                return view('admin.user.update', $data);
            }
        }


        $branch = Branch::where([
            'active' => 1
        ])->get();

        $department = Department::where([
            'active' => 1,
        ])->get();

        $data = [
            'branch'        => $branch,
            'department'    => $department,
            'user'          => $user,
            'role'          => AdminUserRoleHelper::rolesArray($user->todo),
        ];

        return view('admin.user.update', $data);
    }

    public function update(Request $request, $id) {

        if($this->checkRoles('manage_user') === false) {
            return redirect()->route('dashboard');
        }

        $user = User::findOrFail($id);

        $roles = AdminUserRoleHelper::updateAccountRole($request->input());

        $position = $request->position;

        $update = $user->update(array(
            'name' =>  $request->name,
            'branch_id' => $request->branch,
            'department_id' => $request->department,
            'sex'  => $request->sex,
            'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
            'role' => $request->position != null ? $request->position : 3,
            'todo' => $roles
        ));

        if($update) {
            $deRole = json_decode($roles,true);
            if(intval($deRole['role_active']) === 1 and $position != 0) {
                Mail::to($user->email)->send(new ActiveAccountMail($request->input('name')));
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
