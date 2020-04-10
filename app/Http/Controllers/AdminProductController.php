<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{

    public function index(Request $request)
    {
        $product = Product::with('category:id,c_name');
        if($request->name_search)
        {
            $product->where('pro_name', 'like', '%'.$request->name_search.'%');
        }

        if($request->category_search)
        {
            $product->where('pro_category_id', $request->category_search);
        }

        $product = $product->orderByDesc('updated_at')->paginate(15);
        $category = $this->getCategories();

        $viewData = [
            'product'  => $product,
            'category' => $category
        ];
        return view('admin.product.index', $viewData);
    }

    public function create()
    {
        $category = $this->getCategories();
        $brand = $this->getBrandName();
        return view('admin.product.create', compact('category', 'brand'));
    }

    public function update($id) {
        $product = Product::find($id);
        $category = $this->getCategories();
        $brand = $this->getBrandName();
        return view('admin.product.update', compact('product', 'category', 'brand'));
    }

    public function insert(RequestProduct $requestProduct) {
        $this->store($requestProduct);
        return redirect()
            ->action('AdminProductController@index')
            ->with('alert-success', 'Thêm sản phẩm thành công.');
    }

    public function edit(RequestProduct $requestProduct, $id) {
        $this->store($requestProduct, $id);
        return redirect()
            ->action('AdminProductController@index')
            ->with('alert-success', 'Cập nhật sản phẩm thành công.');
    }
    public function store($requestProduct, $id = '')
    {
        if($id) {
            $product = Product::find($id);
        }
        else {
            $product = new Product();
        }
        $product->pro_name = $requestProduct->pro_name;
        $product->pro_description = $requestProduct->pro_description;
        $product->pro_content = $requestProduct->pro_content;
        $product->pro_configuration = $requestProduct->pro_configuration;
        $product->pro_keyword_seo = $requestProduct->pro_keyword_seo ? $requestProduct->pro_keyword_seo:$requestProduct->pro_name;
        $product->pro_description_seo = $requestProduct->pro_description_seo?$requestProduct->pro_description_seo:$requestProduct->pro_name;
        $product->pro_price = $requestProduct->pro_price;
        $product->pro_sale = $requestProduct->pro_sale ? $requestProduct->pro_sale:0;
        $product->pro_category_id = $requestProduct->pro_category_id;
        $product->hot = $requestProduct->hot ? $requestProduct->hot:0;
        $product->pro_slug = str_slug($requestProduct->pro_name);
        $product->brand_id = $requestProduct->brand_id;
        $product->pro_number = $requestProduct->pro_number?$requestProduct->pro_number:0;

        if($requestProduct->hasFile('pro_avatar')) {
            $img = $requestProduct->file('pro_avatar');
            $fileName = $img->getClientOriginalName();
            $imagePath = public_path('') .'/img/product';
            $img->move($imagePath, $fileName);
        }
        else {
            $fileName = $requestProduct->pro_avatar_update;
        }
        $product->pro_avatar = $fileName;
        $product->save();
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()
            ->action('AdminProductController@index')
            ->with('alert-success', 'Xóa sản phẩm thành công.');
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function changeActive($id)
    {
        $product = Product::find($id);
        $product->pro_active = $product->pro_active ? 0 : 1;
        $product->save();
        return redirect()->back();
    }

    public function changeType($id)
    {
        $product = Product::find($id);
        $product->hot = $product->hot ? 0 : 1;
        $product->save();
        return redirect()->back();
    }
    public function getBrandName()
    {
        return Brand::select('id', 'brand_name')->get();
    }
}
