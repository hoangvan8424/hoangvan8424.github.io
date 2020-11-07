<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestDepartment;
use App\Model\Branch;
use App\Model\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $data = Department::all();
        return view('admin.department.list', compact('data'));
    }

    public function add() {
        if($this->checkRoles('add_department') === false) {
            return redirect()->route('department.list');
        }
        return view('admin.department.add');
    }

    public function save(RequestDepartment $request) {
        if($this->checkRoles('add_department') === false) {
            return redirect()->route('department.list');
        }

        $department = new Department();
        $department->name = $request->name;
        $department->note = $request->note ? $request->note:'';
        $department->active = $request->active === 'true'?1:0;

        $department->save();
        return redirect()->route('department.list')->with('alert-success', 'Thêm phòng ban thành công');
    }

    public function showUpdateForm($id) {
        if($this->checkRoles('update_department') === false) {
            return redirect()->route('department.list');
        }

        $department = Department::findOrFail($id);
        return view('admin.department.update', compact( 'department'));
    }

    public function update($id, RequestDepartment $request) {
        if($this->checkRoles('update_department') === false) {
            return redirect()->route('department.list');
        }

        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->note = $request->note ? $request->note:'';
        $department->active = $request->active === 'true'?1:0;

        $department->save();
        return redirect()->route('department.list')->with('alert-success', 'Sửa phòng ban thành công');
    }

    public function delete($id) {
        if($this->checkRoles('delete_department') === false) {
            return redirect()->route('department.list');
        }

        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->back()->with('alert-success', 'Xóa phòng ban thành công.');
    }
}
