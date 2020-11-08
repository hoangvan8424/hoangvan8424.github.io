<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Model\Branch;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index() {
        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $data = Product::where([
                    'branch_id' => $branch_id
                ])->get();
                return view('admin.product.list', compact('data'));
            }
        }
        $data = Product::all();
        return view('admin.product.list', compact('data'));
    }

    public function add() {
        if($this->checkRoles('add_product') === false) {
            return redirect()->route('product.list');
        }

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id' => $branch_id,
                    'active'    => true
                ])->get();
                return view('admin.product.add', compact('branch'));
            }
        }

        $branch = Branch::where([
            'active' => true
        ]);
        return view('admin.product.add', compact('branch'));
    }

    public function save(RequestProduct $request) {
        if($this->checkRoles('add_product') === false) {
            return redirect()->route('product.list');
        }

        $product = new Product();

        $product->name          = $request->name;
        $product->branch_id     = $request->branch;
        $product->price         = $request->price;
        $product->quantity      = $request->quantity;
        $product->note          = $request->note ? $request->note : '';
        $product->active        = $request->active === 'true' ? 1 : 0;

        $product->save();

        return redirect()->route('product.list')->with('alert-success', 'Thêm sản phẩm thành công');
    }

    public function showUpdateForm($id) {
        if($this->checkRoles('update_product') === false) {
            return redirect()->route('product.list');
        }

        if ($this->checkRoles('managed_by_branches') === true) {
            $branch_id = $this->getBranchId();
            if($branch_id != 0) {
                $branch = Branch::where([
                    'id' => $branch_id,
                    'active'    => true
                ])->get();

                $product = Product::findOrFail($id);
                if($product->branch_id != $branch_id) {
                    return redirect()->route('product.list')->with('alert-danger', 'Sản phẩm không tồn tại');
                }
                return view('admin.product.update', compact('branch', 'product'));
            }
        }

        $branch = Branch::all();
        $product = Product::findOrFail($id);
        return view('admin.product.update', compact('branch', 'product'));
    }

    public function update($id, RequestProduct $request) {
        if($this->checkRoles('update_product') === false) {
            return redirect()->route('product.list');
        }

        $product = Product::findOrFail($id);

        $product->name          = $request->name;
        $product->branch_id     = $request->branch;
        $product->price         = $request->price;
        $product->quantity      = $request->quantity;
        $product->note          = $request->note ? $request->note : '';
        $product->active        = $request->active === 'true' ? 1 : 0;

        $product->save();

        return redirect()->route('product.list')->with('alert-success', 'Sửa sản phẩm thành công');
    }

    public function delete($id) {
        if($this->checkRoles('delete_product') === false) {
            return redirect()->route('product.list');
        }

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.list')->with('alert-success', 'Xóa sản phẩm thành công');
    }
}
