<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCustomer;
use App\Model\Branch;
use App\Model\Customer;
use App\Model\Deadline;
use App\Model\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index() {

        $product = Product::all();
        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $data = Customer::where([
                    'branch_id' => $branch_id,
                ])->get();
                return view('admin.customer.list', compact('data', 'product'));
            }
        }

        $data = Customer::all();

        return view('admin.customer.list', compact('data', 'product'));
    }

    public function add() {
        if($this->checkRoles('add_customer') === false) {
            return redirect()->route('customer.list');
        }

        $product = Product::where([
            'active' => true,
        ])->get();

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {

                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();

                $shopper = DB::table('users')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->select('users.name as name', 'users.id as id')
                    ->where([
                        ['role', '=', '3'],
                        ['departments.name', 'like', '%Shop%'],
                        ['users.branch_id', '=', $branch_id],
                    ])->get();


                $makeup = DB::table('users')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->select('users.name as name', 'users.id as id')
                    ->where([
                        ['role', '=', 3],
                        ['departments.name', 'like', '%Makeup%'],
                        ['users.branch_id', '=', $branch_id],
                    ])->get();


                $photographer = DB::table('users')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->select('users.name as name', 'users.id as id')
                    ->where([
                        ['role', '=', 3],
                        ['departments.name', 'like', '%Chup%'],
                        ['users.branch_id', '=', $branch_id],
                    ])->get();

                $data = [
                    'product'       => $product,
                    'shopper'       => $shopper,
                    'makeup'        => $makeup,
                    'photographer'  => $photographer,
                    'branch'        => $branch
                ];
                return view('admin.customer.add', $data);
            }
        }

        $shopper = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', '3'],
                ['departments.name', 'like', '%Shop%']
            ])->get();


        $makeup = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', 3],
                ['departments.name', 'like', '%Makeup%']
            ])->get();


        $photographer = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', 3],
                ['departments.name', 'like', '%Chup%']
            ])->get();

        $branch = Branch::where([
            'active' => true,
        ])->get();

        $data = [
            'product'       => $product,
            'shopper'       => $shopper,
            'makeup'        => $makeup,
            'photographer'  => $photographer,
            'branch'        => $branch
        ];
        return view('admin.customer.add', $data);
    }

    public function save(RequestCustomer $request) {
        if($this->checkRoles('add_customer') === false) {
            return redirect()->route('customer.list');
        }

        $date = date('Y-m-d H:i:s', strtotime($request->get('photography_date')));
        $branch_id  =  $request->get('branch');

        $customer = new Customer([
            'name'                  => $request->get('customer_name'),
            'contract_code'         => $request->get('contract_code'),
            'product_id'            => json_encode($request->get('product_name')),
            'photographer_id'       => $request->get('photographer'),
            'shopper_id'            => $request->get('shopper'),
            'makeup_id'             => $request->get('makeup'),
            'photography_date'      => date('Y-m-d', strtotime($request->get('photography_date'))),
            'note'                  => $request->get('note') != null ? $request->get('note'):'',
            'branch_id'             => $request->get('branch'),
        ]);
        $customer->save();

        $last_id = $customer->id;

        $this->saveToDeadline($last_id, $date, $branch_id);


        return redirect()->route('customer.list')->with('alert-success', 'Thêm khách hàng thành công');
    }

    public function saveToDeadline($id, $date, $branch_id) {
        $data = Customer::where([
            'id' => $id
        ])->first();

        $photographer = $data->photographer->name;
        $work = 'Khách hàng ' .$data->name. ' chụp ảnh (Thợ chụp: '.$photographer.')';

        $today = Carbon::today()->format('Y-m-d H:i:s');
        if($date >= $today) {
            $deadline = new Deadline();
            $deadline->date = $date;
            $deadline->branch_id = $branch_id;
            $deadline->work = $work;
            $deadline->customer_id = $data->id;
            $deadline->save();
        }

    }

    public function showUpdateForm($id) {
        if($this->checkRoles('update_customer') === false) {
            return redirect()->route('customer.list');
        }
        $customer = Customer::findOrFail($id);

        $product = Product::where([
            'active' => true,
        ])->get();


        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();

                if($customer->branch_id != $branch_id) {
                    return redirect()->route('customer.list')->with('alert-danger', 'Khách hàng không tồn tại');
                }

                $branch = Branch::where([
                    'id' => $branch_id,
                    'active' => true,
                ])->get();

                $shopper = DB::table('users')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->select('users.name as name', 'users.id as id')
                    ->where([
                        ['role', '=', '3'],
                        ['departments.name', 'like', '%Shop%'],
                        ['users.branch_id', '=', $branch_id],
                    ])->get();


                $makeup = DB::table('users')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->select('users.name as name', 'users.id as id')
                    ->where([
                        ['role', '=', 3],
                        ['departments.name', 'like', '%Makeup%'],
                        ['users.branch_id', '=', $branch_id],
                    ])->get();


                $photographer = DB::table('users')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->select('users.name as name', 'users.id as id')
                    ->where([
                        ['role', '=', 3],
                        ['departments.name', 'like', '%Chup%'],
                        ['users.branch_id', '=', $branch_id],
                    ])->get();

                $data = [
                    'product'       => $product,
                    'shopper'       => $shopper,
                    'makeup'        => $makeup,
                    'photographer'  => $photographer,
                    'customer'      => $customer,
                    'branch'        => $branch
                ];

                return view('admin.customer.update', $data);
            }
        }

        $shopper = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', '3'],
                ['departments.name', 'like', '%Shop%']
            ])->get();


        $makeup = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', 3],
                ['departments.name', 'like', '%Makeup%']
            ])->get();


        $photographer = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', 3],
                ['departments.name', 'like', '%Chup%']
            ])->get();

        $branch = Branch::where([
            'active' => true,
        ])->get();

        $data = [
            'product'       => $product,
            'shopper'       => $shopper,
            'makeup'        => $makeup,
            'photographer'  => $photographer,
            'customer'      => $customer,
            'branch'        => $branch
        ];

        return view('admin.customer.update', $data);
    }

    public function update($id, RequestCustomer $request) {
        if($this->checkRoles('update_customer') === false) {
            return redirect()->route('customer.list');
        }

        $customer = Customer::findOrFail($id);

        $customer->name               = $request->get('customer_name');
        $customer->contract_code      = $request->get('contract_code');
        $customer->product_id         = json_encode($request->get('product_name'));
        $customer->photographer_id    = $request->get('photographer');
        $customer->shopper_id         = $request->get('shopper');
        $customer->makeup_id          = $request->get('makeup');
        $customer->photography_date   = date('Y-m-d', strtotime($request->get('photography_date')));
        $customer->note               = $request->get('note') != null ? $request->get('note'):'';
        $customer->branch_id          = $request->get('branch');

        $customer->save();

        return redirect()->route('customer.list')->with('alert-success', 'Sửa khách hàng thành công');
    }

    public function delete($id)
    {
        if($this->checkRoles('delete_customer') === false) {
            return redirect()->route('customer.list');
        }

        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.list')->with('alert-success', 'Xóa khách hàng thành công');
    }

    public function getUserFromBranch(Request $request) {
        $branch_id = $request->get('id');

        $shopper = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', '3'],
                ['departments.name', 'like', '%Shop%'],
                ['users.branch_id', '=', $branch_id]
            ])->get();


        $makeup = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', 3],
                ['departments.name', 'like', '%Makeup%'],
                ['users.branch_id', '=', $branch_id]
            ])->get();


        $photographer = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.name as name', 'users.id as id')
            ->where([
                ['role', '=', 3],
                ['departments.name', 'like', '%Chup%'],
                ['users.branch_id', '=', $branch_id]
            ])->get();


        $html = '';
        if(count($shopper) > 0) {
            foreach ($shopper as $key => $value) {
                $html .= "<option value='$value->id'>$value->name</option><br>";
            }
        }

        $html_2 = '';
        if(count($makeup) > 0) {
            foreach ($makeup as $key => $value) {
                $html_2 .= "<option value='$value->id'>$value->name</option><br>";
            }
        }


        $html_3 = '';
        if(count($photographer) > 0) {
            foreach ($photographer as $key => $value) {
                $html_3 .= "<option value='$value->id'>$value->name</option><br>";
            }
        }

        return response()->json([
            'shopper'       => $html,
            'makeup'        => $html_2,
            'photographer'  => $html_3
        ]);
    }
}
