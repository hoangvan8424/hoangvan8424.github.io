<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Slide;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $slide = Slide::all();
        $product = Product::all();
        $category = Category::all();

        $data = [
            'slide' => $slide,
            'product' => $product,
            'category' => $category,
        ];
        return view('admin.dashboard.v1', $data);
    }

}
