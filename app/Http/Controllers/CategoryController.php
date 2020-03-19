<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends FrontendController
{
    public function getListProduct(Request $request)
    {
        $url = preg_split('/(-)/', $request->segment(2));
        if($id = array_pop($url))
        {
            $product = Product::where([
                ['pro_category_id', '=', $id],
                ['pro_active', '=', Product::PUBLIC_STATUS]
            ]);

            if($request->price) {
                $price = $request->price;
                switch ($price)
                {
                    case 1: $product = $product->where('pro_price', '<', '5000000');
                        break;
                    case 5: $product = $product->whereBetween('pro_price', [5000000, 7000000]);
                        break;
                    case 7: $product = $product->whereBetween('pro_price', [7000000, 10000000]);
                        break;
                    case 10: $product = $product->where('pro_price', '>', '10000000');
                        break;
                }
            }

            $product = $product->orderByDesc('id')->paginate(12);
            return view('product.shop', compact('product', 'id'));
        }
        return view('404');
    }
}
