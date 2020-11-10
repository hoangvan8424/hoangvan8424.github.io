<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Deadline;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function index() {
        $data = Deadline::orderBy('date', 'ASC')->get();

        return view('admin.deadline.list', compact('data'));
    }

    public function changeStatus($id, $customer_id = null) {
        $deadline = Deadline::findOrFail($id);
        $deadline->status = $deadline->status ? 0:1;
        $deadline->save();

        if($customer_id != null and $customer_id > 0) {
            $customer = Customer::findOrFail($customer_id);
            $customer->status = 1;
            $customer->save();
        }
        return redirect()->back()->with('alert-success', 'Đã hoàn thành deadline.');
    }
}
