<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProductDemo;
use App\Http\Requests\RequestProductPrint;
use App\Model\Branch;
use App\Model\Product;
use App\Model\ProductDemo;
use App\User;
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
                    ->select('product_demos.id', 'product_demos.receive_demo_date', 'products.name as product_name', 'branches.name as branch_name', 'users.name as username', 'expected_delivery_date_1'
                    , 'expected_delivery_date_2', 'expected_delivery_date_3', 'delivery_date', 'product_demos.note')
                    ->where([
                        'products.branch_id' => $branch_id,
                    ])->get();
                return view('admin.product-demo.list', compact('data'));
            }
        }

        $data = DB::table('product_demos')
            ->join('products', 'product_demos.product_id', '=', 'products.id')
            ->join('branches', 'products.branch_id', '=', 'branches.id')
            ->join('users', 'product_demos.employee_id', '=', 'users.id')
            ->select('product_demos.id', 'product_demos.receive_demo_date', 'products.name as product_name', 'branches.name as branch_name', 'users.name as username', 'expected_delivery_date_1'
                , 'expected_delivery_date_2', 'expected_delivery_date_3', 'delivery_date', 'product_demos.note')
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
        $productDemo->delivery_date               = date('Y-m-d', strtotime($request->delivery_date));
        $productDemo->note                         = $request->note ? $request->note : '';

        $productDemo->save();

        return redirect()->route('product.demo.list')->with('alert-success', 'Thêm sản phẩm demo thành công');
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
                if($demo->product->branch_id != $branch_id) {
                    return redirect()->route('product.demo.list')->with('alert-danger', 'Sản phẩm không tồn tại');
                }

                $data = [
                    'demo'    => $demo,
                    'branch'  => $branch
                ];

                return view('admin.product-demo.update', $data);
            }
        }


        $branch = Branch::where([
            'active' => true,
        ])->get();


        $data = [
            'demo'    => $demo,
            'branch'  => $branch
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
        $productDemo->delivery_date              = date('Y-m-d', strtotime($request->delivery_date));
        $productDemo->note                         = $request->note ? $request->note : '';

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
        $product_name = Product::select('id', 'name')
            ->where([
            'branch_id' => $branch_id,
            'active'    => true
        ])->get();

        $employee_name = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.id', 'users.name')
            ->where([
                ['departments.name', 'like', '%shop%'],
                ['users.branch_id', '=', $branch_id]
            ])->get();


        $html = '';
        if(count($product_name) > 0) {
            foreach ($product_name as $key => $value) {
                $html .= "<option value='$value->id'>$value->name</option><br>";
            }
        }

        $html_2 = '';
        if(count($employee_name) > 0) {
            foreach ($employee_name as $key => $value) {
                $html_2 .= "<option value='$value->id'>$value->name</option><br>";
            }
        }

        return response()->json([
            'product'   => $html,
            'shopper'   => $html_2
        ]);
    }


}
