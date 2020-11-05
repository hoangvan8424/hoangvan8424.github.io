<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProductDemo;
use App\Http\Requests\RequestProductPrint;
use App\Model\Product;
use App\Model\ProductDemo;
use App\User;

class ProductDemoController extends Controller
{
    public function index() {
        $data = ProductDemo::all();
        return view('admin.product-demo.list', compact('data'));
    }

    public function add() {
        $product = Product::where([
            'active' => true,
        ])->get();

        $shopper = User::where([
            'role' => 1
        ])->get();

        $data = [
            'product' => $product,
            'shopper' => $shopper,
        ];
        return view('admin.product-demo.add', $data);
    }

    public function save(RequestProductDemo $request) {

        $productDemo = new ProductDemo();

        $productDemo->product_id                   = $request->name;
        $productDemo->employee_id                  = $request->shopper;
        $productDemo->receive_demo_date            = date('Y-m-d', strtotime($request->receive_demo_date));
        $productDemo->expected_delivery_date_1     = date('Y-m-d', strtotime($request->delivery_date_1));
        $productDemo->expected_delivery_date_2     = date('Y-m-d', strtotime($request->delivery_date_2));
        $productDemo->expected_delivery_date_3     = date('Y-m-d', strtotime($request->delivery_date_3));
        $productDemo->delivery_date               = date('Y-m-d', strtotime($request->delivery_date));
        $productDemo->note                         = $request->note ? $request->note : '';

        $productDemo->save();

        return redirect()->route('product.demo.list')->with('alert-success', 'Thêm sản phẩm demo thành công');
    }


    public function showUpdateForm($id) {
        $demo = ProductDemo::findOrFail($id);

        $product = Product::where([
            'active' => true,
        ])->get();

        $shopper = User::where([
            'role' => 1
        ])->get();

        $data = [
            'product' => $product,
            'shopper' => $shopper,
            'demo'    => $demo,
        ];
        return view('admin.product-demo.update', $data);
    }

    public function update($id, RequestProductDemo $request) {
        $productDemo = ProductDemo::findOrFail($id);

        $productDemo->product_id                   = $request->name;
        $productDemo->employee_id                  = $request->shopper;
        $productDemo->receive_demo_date            = date('Y-m-d', strtotime($request->receive_demo_date));
        $productDemo->expected_delivery_date_1     = date('Y-m-d', strtotime($request->delivery_date_1));
        $productDemo->expected_delivery_date_2     = date('Y-m-d', strtotime($request->delivery_date_2));
        $productDemo->expected_delivery_date_3     = date('Y-m-d', strtotime($request->delivery_date_3));
        $productDemo->delivery_date              = date('Y-m-d', strtotime($request->delivery_date));
        $productDemo->note                         = $request->note ? $request->note : '';

        $productDemo->save();

        return redirect()->route('product.demo.list')->with('alert-success', 'Sửa sản phẩm demo thành công');
    }

    public function delete($id) {
        $productDemo = ProductDemo::findOrFail($id);
        $productDemo->delete();
        return redirect()->route('product.demo.list')->with('alert-success', 'Xóa sản phẩm demo thành công');
    }


}
