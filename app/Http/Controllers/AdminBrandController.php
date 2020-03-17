<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestBrand;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBrandController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        $viewData = [
            'brand' => $brand,
            'category' => $this->getCategory()
        ];
        return view('admin.brand.index', $viewData);
    }

    public function create()
    {
        $category = $this->getCategory();
        return view('admin.brand.create', compact('category'));
    }

    public function insert(RequestBrand $requestBrand)
    {
        $this->store($requestBrand);
        return redirect()
            ->action('AdminBrandController@index')
            ->with('alert-success', 'Thêm thương hiệu thành công.');
    }

    public function update($id)
    {
        $brand = Brand::find($id);
        $category = $this->getCategory();
        return view('admin.brand.update', compact('brand', 'category'));
    }

    public function edit(RequestBrand $requestBrand, $id)
    {
        $brand = Brand::find($id);
        $this->store($requestBrand, $id);
        return redirect()
            ->action('AdminBrandController@index')
            ->with('alert-success', 'Cập nhật thương hiệu thành công.');
    }
    public function store(RequestBrand $requestBrand, $id='')
    {
        if($id)
        {
            $brand = Brand::find($id);
        }
        else
        {
            $brand = new Brand();
        }
        $brand->brand_name = $requestBrand->brand_name ;
        $brand->brand_slug = str_slug($requestBrand->brand_name);
        $brand->brand_status = $requestBrand->brand_display?$requestBrand->brand_display:0;
        $brand->c_id = $requestBrand->category_id;
        $brand->save();

    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()
            ->action('AdminBrandController@index')
            ->with('alert-success', 'Xóa thương hiệu thành công.');
    }

    public function getCategory()
    {
        return Category::all();
    }
}
