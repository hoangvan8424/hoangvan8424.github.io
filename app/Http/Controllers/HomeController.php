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
        $bestSelling = DB::table('products')->where([
            ['pro_active', '=', Product::PUBLIC_STATUS],
            ['pro_number', '>', 0]
        ])->orderByDesc('pro_purchase_number')->limit(10)->get();

        $hotPrice = DB::table('products')->where([
            ['pro_active', '=', Product::PUBLIC_STATUS],
            ['pro_number', '>', 0]
        ])->orderByDesc('pro_sale')->limit(10)->get();

        $new = DB::table('products')->where([
            ['pro_active', '=', Product::PUBLIC_STATUS],
            ['pro_number', '>', 0]
        ])->orderByDesc('created_at')->limit(10)->get();

        $viewData = [
            'bestSelling' => $bestSelling,
            'hotPrice'  => $hotPrice,
            'new' => $new
        ];
        return view('home.index', $viewData);
    }
}
