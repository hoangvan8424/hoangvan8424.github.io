<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends FrontendController
{
    public function productDetail(Request $request)
    {
        $url = preg_split('/(-)/', $request->segment(2));
        $id = array_pop($url);
        if($id!=null) {
            $product = DB::table('products')
                ->where([
                    ['id', '=', $id],
                    ['pro_active', '=', Product::PUBLIC_STATUS]
                ])->first();
            $review = Review::with('product', 'user')
                ->where([
                    're_approved' => 1,
                    're_spam' => 0
                ])->orderByDesc('id')->paginate(10);
            return view('product.product-details', compact('product', 'review'));
        }
        return view('404');
    }
}
