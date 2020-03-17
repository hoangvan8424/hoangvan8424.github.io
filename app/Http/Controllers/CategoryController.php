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
            $product = DB::table('products')->where([
                ['pro_category_id', '=', $id],
                ['pro_active', '=', Product::PUBLIC_STATUS]
            ])->orderByDesc('id')->paginate(10);
            return view('product.shop', compact('product', 'id'));
        }
        return view('404');
    }
}
