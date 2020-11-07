<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestBranch;
use App\Model\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index() {
        $data = Branch::all();
        return view('admin.branch.list', compact('data'));
    }

    public function add() {
        if($this->checkRoles('add_branch') === false) {
            return redirect()->route('branch.list');
        }
        return view('admin.branch.add');
    }

    public function save(RequestBranch $request) {
        if($this->checkRoles('add_branch') === false) {
            return redirect()->route('branch.list');
        }

        $branch = new Branch();

        $branch->name       = $request->name;
        $branch->address    = $request->address ? $request->address : '';
        $branch->note       = $request->note ? $request->note : '';
        $branch->active     = $request->active === 'true' ? 1:0;

        $branch->save();

        return redirect()->route('branch.list')->with('alert-success', 'Thêm chi nhánh thành công.');

    }

    public function showUpdateForm($id) {
        if($this->checkRoles('update_branch') === false) {
            return redirect()->route('branch.list');
        }
        $data = Branch::findOrFail($id);
        return view('admin.branch.update', compact('data'));
    }

    public function update(RequestBranch $request, $id) {
        if($this->checkRoles('update_branch') === false) {
            return redirect()->route('branch.list');
        }
        $branch = Branch::findOrFail($id);

        $branch->name       = $request->name;
        $branch->address    = $request->address ? $request->address : '';
        $branch->note       = $request->note ? $request->note : '';
        $branch->active     = $request->active === 'true' ? 1:0;

        $branch->save();

        return redirect()->route('branch.list')->with('alert-success', 'Sửa chi nhánh thành công.');
    }

    public function delete($id) {
        if($this->checkRoles('delete_branch') === false) {
            return redirect()->route('branch.list');
        }
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->back()->with('alert-success', 'Xóa chi nhánh thành công.');

    }
}
