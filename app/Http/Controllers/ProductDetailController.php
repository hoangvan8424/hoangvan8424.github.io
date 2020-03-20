<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends FrontendController
{
    public function productDetail(Request $request)
    {
        $url = preg_split('/(-)/', $request->segment(2));
        $id = array_pop($url);
        if($id!=null) {
            $productDetail = DB::table('products')
                ->where([
                    ['id', '=', $id],
                    ['pro_active', '=', Product::PUBLIC_STATUS]])->first();
            return view('product.product-details', compact('productDetail'));
        }
        return view('404');
    }
}
