<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $data = Category::all();
        return view('admin.category.list', compact('data'));
    }

    public function showAddForm() {
        return view('admin.category.add');
    }

    public function save(CategoryRequest $request) {
        Category::create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug') != null ? $request->get('slug') : Str::slug($request->get('name')),
            'icon' => $request->get('icon') != null ? $request->get('icon') : '',
            'active'   => $request->get('active') === 'true' ? 1:0,
        ]);

        return redirect()->route('category.list')->with('alert-success', 'Thêm danh mục sản phẩm thành công.');
    }

    public function showUpdateForm($id) {
        $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category'));
    }

    public function update($id, CategoryRequest $request) {

        $category = Category::findOrFail($id);

        $category->name = $request->get('name');
        $category->slug = $request->get('slug') != null ? $request->get('slug') : Str::slug($request->get('name'));
        $category->icon = $request->get('icon') != null ? $request->get('icon') : '';
        $category->active = $request->get('active') === 'true' ? 1:0;

        $category->save();

        return redirect()->route('category.list')->with('alert-success', 'Sửa danh mục sản phẩm thành công.');
    }

    public function delete($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.list')->with('alert-success', 'Xóa danh mục sản phẩm thành công.');
    }
}
