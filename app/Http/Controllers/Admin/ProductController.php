<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $data = Product::all();
        return view('admin.product.list', compact('data'));
    }

    public function showAddForm() {
        return view('admin.product.add');
    }

    public function save() {

    }

    public function showUpdateForm() {

    }

    public function update() {

    }

    public function delete() {

    }
}
