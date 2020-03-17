<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $viewData = [
            'category' => $category
        ];
        return view('admin.category.index', $viewData);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function update($id)
    {
        $category = Category::find($id);
        return view('admin.category.update', compact('category'));
    }

    public function store($requestCategory, $id = '')
    {
        if($id) {
            $category = Category::find($id);
        }
        else {
            $category = new Category();
        }
        $category->c_name = $requestCategory->c_name;
        $category->c_slug = str_slug($requestCategory->c_name);
        $category->c_icon = $requestCategory->c_icon;
        $category->c_keyword_seo = $requestCategory->c_keyword_seo ? $requestCategory->c_keyword_seo : $requestCategory->c_name;
        $category->c_description_seo = $requestCategory->c_description_seo ? $requestCategory->c_description_seo : $requestCategory->c_name;
        $category->save();
    }
    public function insert(RequestCategory $requestCategory)
    {
        $this->store($requestCategory);
        return redirect()->action('AdminCategoryController@index')->with('alert-success', 'Thêm danh mục thành công.');
    }

    public function edit(RequestCategory $requestCategory, $id)
    {
        $this->store($requestCategory, $id);
//        $requestCategory->session()->flash('alert-success', 'Cập nhật thành công!');
        return redirect()->action('AdminCategoryController@index')->with('alert-success', 'Cập nhật danh mục thành công.');

    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->action('AdminCategoryController@index')->with('alert-success', 'Xoá danh mục thành công.');
    }

    public function changeStatus($id)
    {
        $category = Category::find($id);
        $category->c_active = $category->c_active ? 0 : 1;
        $category->save();
        return redirect()->back();
    }

}
