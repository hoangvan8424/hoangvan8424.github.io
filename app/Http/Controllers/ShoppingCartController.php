<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShoppingCartController extends FrontendController
{
    public function index() {
        return view('product.cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product)
        {
            return view('404');
        }
        $cart = session()->get('cart');

//  Nếu giỏ hàng trống, thêm sản phẩm đầu tiên vào giỏ
        if(!$cart)
        {
            $cart = [
                $id => [
                    "name" => $product->pro_name,
                    "quantity" => 1,
                    "price" => $product->pro_price,
                    "sale" => $product->pro_sale,
                    "photo" => $product->pro_avatar
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
        }

//  Nếu giỏ hàng không trống và đã tồn tại sản phẩm đó, tăng số lượng lên 1
        if(isset($cart[$id]))
        {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
        }

//  Nếu giỏ hàng không trống và sản phẩm không tồn tại trong giỏ hàng, thì số lượng là 1
        $cart[$id] = [
            "name" => $product->pro_name,
            "quantity" => 1,
            "price" => $product->pro_price,
            "sale" => $product->pro_sale,
            "photo" => $product->pro_avatar
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
    }
}
