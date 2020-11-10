<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProductPrint;
use App\Model\Branch;
use App\Model\Customer;
use App\Model\Product;
use App\Model\ProductPrint;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductPrintController extends Controller
{
    public function index() {

        if($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {

                $data = DB::table('product_prints')
                    ->join('products', 'product_prints.product_id', '=', 'products.id')
                    ->join('branches', 'product_prints.branch_id', '=', 'branches.id')
                    ->join('users', 'product_prints.employee_id', '=', 'users.id')
                    ->join('customers', 'product_prints.customer_id', '=', 'customers.id')
                    ->select('product_prints.id', 'product_prints.date_send_selected_code',
                        'products.name as product_name', 'branches.name as branch_name', 'users.name as username',
                        'review_date_1', 'review_date_2',
                        'review_date_3', 'delivery_date_in_branch', 'customer_receive_date',
                        'closing_date', 'product_prints.note', 'customers.name as customer_name')
                    ->where([
                        'products.branch_id' => $branch_id,
                    ])->get();
                return view('admin.product-print.list', compact('data'));
            }
        }


        $data = DB::table('product_prints')
            ->join('products', 'product_prints.product_id', '=', 'products.id')
            ->join('branches', 'product_prints.branch_id', '=', 'branches.id')
            ->join('users', 'product_prints.employee_id', '=', 'users.id')
            ->join('customers', 'product_prints.customer_id', '=', 'customers.id')
            ->select('product_prints.id', 'product_prints.date_send_selected_code',
                'products.name as product_name', 'branches.name as branch_name', 'users.name as username',
                'review_date_1', 'review_date_2',
                'review_date_3', 'delivery_date_in_branch', 'customer_receive_date', 'closing_date',
                'product_prints.note', 'customers.name as customer_name')
            ->get();
        return view('admin.product-print.list', compact('data'));
    }

    public function add() {

        if($this->checkRoles('add_product_print') === false) {
            return redirect()->route('product.print.list');
        }

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();
                return view('admin.product-print.add', compact('branch'));
            }
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
        $productPrint->note                     = $request->note !== null ? $request->note : '';
        $productPrint->customer_id = $request->customer;
        $productPrint->branch_id = $request->branch;

        $productPrint->save();

        return redirect()->route('product.print.list')->with('alert-success', 'Thêm sản phẩm in thành công');
    }


    public function showUpdateForm($id) {
        if($this->checkRoles('update_product_print') === false) {
            return redirect()->route('product.print.list');
        }

        $print = ProductPrint::findOrFail($id);

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();
                if($print->branch_id != $branch_id) {
                    return redirect()->route('product.print.list')
                        ->with('alert-danger', 'Sản phẩm không tồn tại');
                }

                $customer = Customer::where([
                    'branch_id' => $branch_id
                ]);

                $data = [
                    'print'     => $print,
                    'branch'    => $branch,
                    'customer'  => $customer
                ];

                return view('admin.product-print.update', $data);
            }
        }

        $branch = Branch::where([
            'active' => true,
        ])->get();

        $customer = Customer::all();

        $data = [
            'print'   => $print,
            'branch'  => $branch,
            'customer'  => $customer
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
        $productPrint->note                     = $request->note !== null ? $request->note : '';
        $productPrint->customer_id = $request->customer;
        $productPrint->branch_id = $request->branch;

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
