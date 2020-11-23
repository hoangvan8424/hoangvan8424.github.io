<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    public function getAllProduct() {
        $product = Product::where([
            'active' => 1,
        ])->paginate(9);

        $category = Category::where([
            'active' => true,
        ])->get();

        $data = [
            'product' => $product,
            'category'  => $category,
        ];

        return view('product.all', $data);
    }

    public function getDetailProduct($slug) {
        $detail = Product::where([
            'slug' => $slug,
        ])->first();

        $category = Category::where([
            'active' => true,
        ])->get();

        $data = [
            'detail' => $detail,
            'category'  => $category,
        ];
        return view('product.detail', $data);
    }
}
