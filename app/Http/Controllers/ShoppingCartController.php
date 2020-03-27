<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends FrontendController
{
    public function index()
    {
        return view('product.cart');
    }

    public function addToCart($id, Request $request)
    {
        $product = Product::find($id);

        if (!$product) {
            return view('404');
        }
        $cart = session()->get('cart');

//  Nếu giỏ hàng trống, thêm sản phẩm đầu tiên vào giỏ
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->pro_name,
                    "quantity" => 1,
                    "price" => $product->pro_price,
                    "sale" => $product->pro_sale,
                    "photo" => $product->pro_avatar,
                    "slug" => $product->pro_slug
                ]
            ];
            session()->put('cart', $cart);
//            dd($cart);
            return redirect()->back()->with('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
        }

//  Nếu giỏ hàng không trống và đã tồn tại sản phẩm đó, tăng số lượng lên 1
        if (isset($cart[$id])) {
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
            "photo" => $product->pro_avatar,
            "slug" => $product->pro_slug
        ];
        session()->put('cart', $cart);
//        $request->session()->flush(); //xóa tất cả session
        return redirect()->back()->with('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
    }

    public function update(Request $request)
    {
        if ($request->product_id and $request->product_quantity) {
            $cart = session()->get('cart');
            $cart[$request->product_id]["quantity"] = $request->product_quantity;
            session()->put('cart', $cart);
            session()->flash('alert-success', 'Cập nhật giỏ hàng thành công!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->product_id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }
            session()->flash('alert-success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
        }
    }
}
