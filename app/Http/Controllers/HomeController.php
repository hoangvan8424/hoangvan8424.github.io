<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Model\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::where([
            'active' => true,
        ])->get();

        $slide = Slide::where([
            'active' => true,
        ])->get();

        $product_hot = Product::where([
            'hot' => 1,
            'active' => 1,
        ])->paginate(12);

        $data = [
            'category' => $category,
            'slide' => $slide,
            'hot'   => $product_hot,
        ];
        return view('home', $data);
    }

    public function getAboutUs() {
        $category = Category::where([
            'active' => true,
        ])->get();
        return view('about-us', compact('category'));
    }
}
