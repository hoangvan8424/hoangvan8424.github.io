<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Model\Branch;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $data = Product::all();
        return view('admin.product.list', compact('data'));
    }

    public function add() {
        $branch = Branch::all();
        return view('admin.product.add', compact('branch'));
    }

    public function save(RequestProduct $request) {
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
        $branch = Branch::all();
        $product = Product::findOrFail($id);
        return view('admin.product.update', compact('branch', 'product'));
    }

    public function update($id, RequestProduct $request) {
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
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.list')->with('alert-success', 'Xóa sản phẩm thành công');
    }
}
