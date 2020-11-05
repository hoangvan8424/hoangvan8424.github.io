<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCustomer;
use App\Model\Customer;
use App\Model\Product;
use App\User;

class CustomerController extends Controller
{
    public function index() {
        $data = Customer::all();
        $product = Product::all();
        return view('admin.customer.list', compact('data', 'product'));
    }

    public function add() {
        $product = Product::where([
            'active' => true,
        ])->get();

        $shopper = User::where([
            'role' => 1
        ])->get();

        $makeup = User::where([
            'role' => 2
        ])->get();

        $photographer = User::where([
            'role' => 3
        ])->get();

        $data = [
            'product'       => $product,
            'shopper'       => $shopper,
            'makeup'        => $makeup,
            'photographer'  => $photographer,
        ];
        return view('admin.customer.add', $data);
    }

    public function save(RequestCustomer $request) {
        $customer = new Customer([
            'name'                  => $request->get('customer_name'),
            'contract_code'         => $request->get('contract_code'),
            'product_id'            => json_encode($request->get('product_name')),
            'photographer_id'       => $request->get('photographer'),
            'shopper_id'            => $request->get('shopper'),
            'makeup_id'             => $request->get('makeup'),
            'photography_date'      => date('Y-m-d', strtotime($request->get('photography_date'))),
            'note'                  => $request->get('note') ? $request->get('note'):''
        ]);
        $customer->save();

        return redirect()->route('customer.list')->with('alert-success', 'Thêm khách hàng thành công');
    }

    public function showUpdateForm($id) {
        $customer = Customer::findOrFail($id);

        $product = Product::where([
            'active' => true,
        ])->get();

        $shopper = User::where([
            'role' => 1
        ])->get();

        $makeup = User::where([
            'role' => 2
        ])->get();

        $photographer = User::where([
            'role' => 3
        ])->get();

        $data = [
            'product'       => $product,
            'shopper'       => $shopper,
            'makeup'        => $makeup,
            'photographer'  => $photographer,
            'customer'      => $customer
        ];

        return view('admin.customer.update', $data);
    }

    public function update($id, RequestCustomer $request) {
        $customer = Customer::findOrFail($id);

        $customer->name               = $request->get('customer_name');
        $customer->contract_code      = $request->get('contract_code');
        $customer->product_id         = json_encode($request->get('product_name'));
        $customer->photographer_id    = $request->get('photographer');
        $customer->shopper_id         = $request->get('shopper');
        $customer->makeup_id          = $request->get('makeup');
        $customer->photography_date   = date('Y-m-d', strtotime($request->get('photography_date')));
        $customer->note               = $request->get('note') ? $request->get('note'):'';

        $customer->save();

        return redirect()->route('customer.list')->with('alert-success', 'Sửa khách hàng thành công');
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.list')->with('alert-success', 'Xóa khách hàng thành công');
    }
}
