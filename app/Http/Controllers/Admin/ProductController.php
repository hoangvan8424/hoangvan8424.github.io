<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Model\Category;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index() {
        $data = Product::all();
        return view('admin.product.list', compact('data'));
    }

    public function showAddForm() {
        $category = Category::where([
            'active' => true
        ])->get();
        return view('admin.product.add', compact('category'));
    }

    public function save(ProductRequest $request) {
        $product = new Product();
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->total_number = $request->total_number;
        $product->description = $request->description;
        $product->information = $request->information;
        $product->sale = $request->sale;

        $img_1 = "";
        if($request->has('img_1')) {
            $img = $request->file('img_1');
            $img_1 = 'p_' . rand(). '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/products';
            $img->move($imgPath, $img_1);
        }

        $img_2 = "";
        if($request->has('img_2')) {
            $img = $request->file('img_2');
            $img_2 = 'p_' . rand(). '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/products';
            $img->move($imgPath, $img_2);
        }

        $img_3 = "";
        if($request->has('img_3')) {
            $img = $request->file('img_3');
            $img_3 = 'p_' . rand() . '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/products';
            $img->move($imgPath, $img_3);
        }

        $img_4 = "";
        if($request->has('img_4')) {
            $img = $request->file('img_4');
            $img_4 = 'p_' . rand(). '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/products';
            $img->move($imgPath, $img_4);
        }

        $img_5 = "";
        if($request->has('img_5')) {
            $img = $request->file('img_5');
            $img_5 = 'p_' . rand(). '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('').'/images/products';
            $img->move($imgPath, $img_5);
        }

        $product->image_1 = $img_1;
        $product->image_2 = $img_2;
        $product->image_3 = $img_3;
        $product->image_4 = $img_4;
        $product->image_5 = $img_5;

        $product->save();

        return redirect()->route('product.list')->with('alert-success', 'Thêm sản phẩm thành công.');


    }

    public function showUpdateForm($id) {
        $product = Product::findOrFail($id);
        $category = Category::where([
            'active' => true
        ])->get();

        return view('admin.product.update', compact('product', 'category'));
    }

    public function update($id, ProductRequest $request) {
        $product = Product::findOrFail($id);

        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->total_number = $request->total_number;
        $product->description = $request->description;
        $product->information = $request->information;
        $product->sale = $request->sale;

        $img_1 = $product->image_1;
        if($request->has('img_1')) {
            $img = $request->file('img_1');
            $img_1 = 'p_' . rand(). '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/products';
            $img->move($imgPath, $img_1);
        }

        $img_2 = $product->image_2;
        if($request->has('img_2')) {
            $img = $request->file('img_2');
            $img_2 = 'p_' . rand(). '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/products';
            $img->move($imgPath, $img_2);
        }

        $img_3 = $product->image_3;
        if($request->has('img_3')) {
            $img = $request->file('img_3');
            $img_3 = 'p_' . rand() . '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/products';
            $img->move($imgPath, $img_3);
        }

        $img_4 = $product->image_4;
        if($request->has('img_4')) {
            $img = $request->file('img_4');
            $img_4 = 'p_' . rand(). '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('') . '/images/products';
            $img->move($imgPath, $img_4);
        }

        $img_5 = $product->image_5;
        if($request->has('img_5')) {
            $img = $request->file('img_5');
            $img_5 = 'p_' . rand(). '.' . $img->getClientOriginalExtension();
            $imgPath = public_path('').'/images/products';
            $img->move($imgPath, $img_5);
        }

        $product->image_1 = $img_1;
        $product->image_2 = $img_2;
        $product->image_3 = $img_3;
        $product->image_4 = $img_4;
        $product->image_5 = $img_5;

        $product->save();
        return redirect()->route('product.list')->with('alert-success', 'Sửa sản phẩm thành công.');
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.list')->with('alert-success', 'Xóa sản phẩm thành công.');
    }
}
