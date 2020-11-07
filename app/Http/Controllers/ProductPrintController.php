<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProductPrint;
use App\Model\Branch;
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
        if($this->checkRoles('add_product_print') === false) {
            return redirect()->route('product.print.list');
        }

        $branch = Branch::where([
            'active' => true,
        ])->get();

        return view('admin.product-print.add', compact('branch'));
    }

    public function save(RequestProductPrint $request) {
        if($this->checkRoles('add_product_print') === false) {
            return redirect()->route('product.print.list');
        }

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
        if($this->checkRoles('update_product_print') === false) {
            return redirect()->route('product.print.list');
        }

        $branch = Branch::where([
            'active' => true,
        ])->get();

        $print = ProductPrint::findOrFail($id);


        $data = [
            'print'   => $print,
            'branch'  => $branch
        ];
        return view('admin.product-print.update', $data);
    }

    public function update($id, RequestProductPrint $request) {
        if($this->checkRoles('update_product_print') === false) {
            return redirect()->route('product.print.list');
        }

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
        if($this->checkRoles('delete_product_print') === false) {
            return redirect()->route('product.print.list');
        }

        $productPrint = ProductPrint::findOrFail($id);
        $productPrint->delete();
        return redirect()->route('product.print.list')->with('alert-success', 'Xóa sản phẩm in thành công');
    }


}
