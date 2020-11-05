<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProductPrint;
use App\Model\Product;
use App\Model\ProductPrint;
use App\User;
use Illuminate\Http\Request;

class ProductPrintController extends Controller
{
    public function index() {
        $data = ProductPrint::all();
        return view('admin.product-print.list', compact('data'));
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
        return view('admin.product-print.add', $data);
    }

    public function save(RequestProductPrint $request) {

        $productPrint = new ProductPrint();

        $productPrint->product_id               = $request->name;
        $productPrint->employee_id              = $request->shopper;
        $productPrint->date_send_selected_code  = date('Y-m-d', strtotime($request->date_selected_code));
        $productPrint->review_date_1            = date('Y-m-d', strtotime($request->review_date_1));
        $productPrint->review_date_2            = date('Y-m-d', strtotime($request->review_date_2));
        $productPrint->review_date_3            = date('Y-m-d', strtotime($request->review_date_3));
        $productPrint->closing_date             = date('Y-m-d', strtotime($request->closing_date));
        $productPrint->delivery_date_in_branch  = date('Y-m-d', strtotime($request->date_in_branch));
        $productPrint->customer_receive_date    = date('Y-m-d', strtotime($request->receive_date));
        $productPrint->note                     = $request->note ? $request->note : '';

        $productPrint->save();

        return redirect()->route('product.print.list')->with('alert-success', 'Thêm sản phẩm in thành công');
    }


    public function showUpdateForm($id) {
        $print = ProductPrint::findOrFail($id);

        $product = Product::where([
            'active' => true,
        ])->get();

        $shopper = User::where([
            'role' => 1
        ])->get();

        $data = [
            'product' => $product,
            'shopper' => $shopper,
            'print'   => $print,
        ];
        return view('admin.product-print.update', $data);
    }

    public function update($id, RequestProductPrint $request) {
        $productPrint = ProductPrint::findOrFail($id);

        $productPrint->product_id               = $request->name;
        $productPrint->employee_id              = $request->shopper;
        $productPrint->date_send_selected_code  = date('Y-m-d', strtotime($request->date_selected_code));
        $productPrint->review_date_1            = date('Y-m-d', strtotime($request->review_date_1));
        $productPrint->review_date_2            = date('Y-m-d', strtotime($request->review_date_2));
        $productPrint->review_date_3            = date('Y-m-d', strtotime($request->review_date_3));
        $productPrint->closing_date             = date('Y-m-d', strtotime($request->closing_date));
        $productPrint->delivery_date_in_branch  = date('Y-m-d', strtotime($request->date_in_branch));
        $productPrint->customer_receive_date    = date('Y-m-d', strtotime($request->receive_date));
        $productPrint->note                     = $request->note ? $request->note : '';

        $productPrint->save();

        return redirect()->route('product.print.list')->with('alert-success', 'Sửa sản phẩm in thành công');
    }

    public function delete($id) {
        $productPrint = ProductPrint::findOrFail($id);
        $productPrint->delete();
        return redirect()->route('product.print.list')->with('alert-success', 'Xóa sản phẩm in thành công');
    }


}
