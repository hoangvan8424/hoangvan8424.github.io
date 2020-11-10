<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProductDemo;
use App\Http\Requests\RequestProductPrint;
use App\Model\Branch;
use App\Model\Customer;
use App\Model\Deadline;
use App\Model\Product;
use App\Model\ProductDemo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDemoController extends Controller
{
    public function index() {
        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {

                $data = DB::table('product_demos')
                    ->join('products', 'product_demos.product_id', '=', 'products.id')
                    ->join('branches', 'products.branch_id', '=', 'branches.id')
                    ->join('users', 'product_demos.employee_id', '=', 'users.id')
                    ->join('customers', 'product_demos.customer_id', '=', 'customers.id')
                    ->select('product_demos.id', 'product_demos.receive_demo_date', 'products.name as product_name', 'branches.name as branch_name', 'users.name as username', 'expected_delivery_date_1'
                    , 'expected_delivery_date_2', 'expected_delivery_date_3', 'delivery_date', 'product_demos.note', 'customers.name as customer_name')
                    ->where([
                        'products.branch_id' => $branch_id,
                    ])->get();
                return view('admin.product-demo.list', compact('data'));
            }
        }

        $data = DB::table('product_demos')
            ->join('products', 'product_demos.product_id', '=', 'products.id')
            ->join('branches', 'product_demos.branch_id', '=', 'branches.id')
            ->join('users', 'product_demos.employee_id', '=', 'users.id')
            ->join('customers', 'product_demos.customer_id', '=', 'customers.id')
            ->select('product_demos.id', 'product_demos.receive_demo_date', 'products.name as product_name',
                'branches.name as branch_name', 'users.name as username', 'expected_delivery_date_1'
                ,'expected_delivery_date_2', 'expected_delivery_date_3', 'delivery_date',
                'product_demos.note', 'customers.name as customer_name')
            ->get();

        return view('admin.product-demo.list', compact('data'));
    }

    public function add() {
        if($this->checkRoles('add_product_demo') === false) {
            return redirect()->route('product.demo.list');
        }

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();
                return view('admin.product-demo.add', compact('branch'));
            }
        }

        $branch = Branch::where([
            'active' => true,
        ])->get();

        $data = [
            'branch'  => $branch
        ];


        return view('admin.product-demo.add', $data);
    }

    public function save(RequestProductDemo $request) {
        if($this->checkRoles('add_product_demo') === false) {
            return redirect()->route('product.demo.list');
        }

        $productDemo = new ProductDemo();

        $productDemo->product_id                   = $request->name;
        $productDemo->employee_id                  = $request->shopper;
        $productDemo->receive_demo_date            = date('Y-m-d', strtotime($request->receive_demo_date));
        $productDemo->expected_delivery_date_1     = date('Y-m-d', strtotime($request->delivery_date_1));
        $productDemo->expected_delivery_date_2     = date('Y-m-d', strtotime($request->delivery_date_2));
        $productDemo->expected_delivery_date_3     = date('Y-m-d', strtotime($request->delivery_date_3));
        $productDemo->delivery_date                = date('Y-m-d', strtotime($request->delivery_date));
        $productDemo->note                         = $request->note ? $request->note : '';
        $productDemo->customer_id                  = $request->customer;
        $productDemo->branch_id                    = $request->branch;

        $productDemo->save();

        $last_id = $productDemo->id;
        $last_product_demo = ProductDemo::where([
            'id' => $last_id
        ])->first();
        $employee = $last_product_demo->user->name;
        $work_1 = $employee .' giao file demo lần 1';
        $work_2 = $employee .' giao file demo lần 2';
        $work_3 = $employee .' giao file demo lần 3';
        $work_4 = 'Giao file demo cho khách';
        $branch_id = $last_product_demo->branch_id;

        $this->saveToDeadline($last_product_demo->expected_delivery_date_1, $branch_id, $work_1);
        $this->saveToDeadline($last_product_demo->expected_delivery_date_2, $branch_id, $work_2);
        $this->saveToDeadline($last_product_demo->expected_delivery_date_3, $branch_id, $work_3);
        $this->saveToDeadline($last_product_demo->delivery_date, $branch_id, $work_4);

        return redirect()->route('product.demo.list')->with('alert-success', 'Thêm sản phẩm demo thành công');
    }

    public function saveToDeadline($date, $branch_id, $work) {

        $today = Carbon::today()->format('Y-m-d H:i:s');
        if($date >= $today) {
            $deadline = new Deadline();
            $deadline->date = $date;
            $deadline->branch_id = $branch_id;
            $deadline->work = $work;

            $deadline->save();
        }

    }

    public function showUpdateForm($id) {
        if($this->checkRoles('update_product_demo') === false) {
            return redirect()->route('product.demo.list');
        }

        $demo = ProductDemo::findOrFail($id);

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();

                if($demo->branch_id != $branch_id) {
                    return redirect()->route('product.demo.list')
                        ->with('alert-danger', 'Sản phẩm không tồn tại');
                }

                $customer = Customer::where([
                    'branch_id' => $branch_id
                ]);

                $data = [
                    'demo'    => $demo,
                    'branch'  => $branch,
                    'customer' => $customer
                ];

                return view('admin.product-demo.update', $data);
            }
        }


        $branch = Branch::where([
            'active' => true,
        ])->get();

        $customer = Customer::all();

        $data = [
            'demo'    => $demo,
            'branch'  => $branch,
            'customer' => $customer
        ];
        return view('admin.product-demo.update', $data);
    }

    public function update($id, RequestProductDemo $request) {
        if($this->checkRoles('update_product_demo') === false) {
            return redirect()->route('product.demo.list');
        }

        $productDemo = ProductDemo::findOrFail($id);

        $productDemo->product_id                   = $request->name;
        $productDemo->employee_id                  = $request->shopper;
        $productDemo->receive_demo_date            = date('Y-m-d', strtotime($request->receive_demo_date));
        $productDemo->expected_delivery_date_1     = date('Y-m-d', strtotime($request->delivery_date_1));
        $productDemo->expected_delivery_date_2     = date('Y-m-d', strtotime($request->delivery_date_2));
        $productDemo->expected_delivery_date_3     = date('Y-m-d', strtotime($request->delivery_date_3));
        $productDemo->delivery_date                = date('Y-m-d', strtotime($request->delivery_date));
        $productDemo->note                         = $request->note !== null ? $request->note : '';
        $productDemo->customer_id                  = $request->customer;
        $productDemo->branch_id                    =  $request->branch;

        $productDemo->save();

        return redirect()->route('product.demo.list')->with('alert-success', 'Sửa sản phẩm demo thành công');
    }

    public function delete($id) {
        if($this->checkRoles('delete_product_demo') === false) {
            return redirect()->route('product.demo.list');
        }

        $productDemo = ProductDemo::findOrFail($id);
        $productDemo->delete();
        return redirect()->route('product.demo.list')->with('alert-success', 'Xóa sản phẩm demo thành công');
    }

    public function getProductFromBranch(Request $request) {
        $branch_id = $request->get('id');

        $customer = Customer::where([
            'branch_id' => $branch_id
        ])->get();

        $employee_name = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.id', 'users.name')
            ->where([
                ['departments.name', 'like', '%shop%'],
                ['users.branch_id', '=', $branch_id]
            ])->get();

        $html_2 = '';
        if(count($employee_name) > 0) {
            foreach ($employee_name as $key => $value) {
                $html_2 .= "<option value='$value->id'>$value->name</option><br>";
            }
        }

        $html_3 = "<option value=''>Chọn...</option><br>";
        if(count($customer) > 0) {
            foreach ($customer as $key => $value) {
                $html_3 .= "<option value='$value->id'>$value->name</option><br>";
            }
        }

        return response()->json([
            'shopper'   => $html_2,
            'customer'  => $html_3
        ]);
    }


    public function getCustomerFromBranch(Request $request) {
        $customer_id = $request->get('id');
        $customer = Customer::select('product_id')
        ->where([
            'id' => $customer_id
        ])->first();

        $product = Product::where([
            'active' => true
        ])->get();

        $html = "<option value=''>Chọn...</option><br>";

        $product_name = json_decode($customer->product_id, true);
        foreach ($product_name as $customer_product) {
            foreach ($product as $products) {
                if($customer_product == $products->id) {
                    $html .= "<option value='$products->id'>$products->name</option><br>";
                }
            }
        }

        return response()->json([
            'product' => $html
        ]);
    }


}
