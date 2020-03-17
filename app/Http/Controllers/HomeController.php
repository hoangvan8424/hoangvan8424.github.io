<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $computerProduct = DB::table('products')->where([
            ['pro_category_id', '=', 1],
            ['pro_active', '=', Product::PUBLIC_STATUS]
        ])->limit(5)->get();

        $phoneProduct = DB::table('products')->where([
            ['pro_category_id', '=', 2],
            ['pro_active', '=', Product::PUBLIC_STATUS]
        ])->limit(5)->get();
        $viewData = [
            'computerProduct' => $computerProduct,
            'phoneProduct' =>$phoneProduct
        ];
        return view('home.index', $viewData);
    }
}
