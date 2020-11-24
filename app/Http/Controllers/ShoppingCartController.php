<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return view('product.cart');
    }

    public function addToCart( Request $request)
    {
        if($id=$request->id and $quantity = $request->quantity) {
            $product = Product::find($id);
            if (!$product) {
                return view('404');
            }
            $cart = session()->get('cart');

            if (!$cart) {
                $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => $quantity,
                        "price" => $product->price,
                        "sale" => $product->sale,
                        "photo" => $product->image_1,
                        "slug" => $product->slug
                    ]
                ];
                session()->put('cart', $cart);
                session()->flash('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
            }
            else {
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] += $quantity;
                    session()->put('cart', $cart);
                    session()->flash('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
                }
                else {
                    $cart[$id] = [
                        "name" => $product->name,
                        "quantity" => $quantity,
                        "price" => $product->price,
                        "sale" => $product->sale,
                        "photo" => $product->avatar,
                        "slug" => $product->slug
                    ];
                    session()->put('cart', $cart);
                    session()->flash('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
                }
            }
        }
    }

    public function update(Request $request)
    {
        if ($request->product_id and $request->product_quantity) {
            $cart = $request->session()->get('cart');
            $cart[$request->product_id]["quantity"] = $request->product_quantity;
            $request->session()->put('cart', $cart);
            $request->session()->flash('alert-success', 'Cập nhật giỏ hàng thành công!');
        }
    }

    public function remove(Request $request)
    {
        if ($id = $request->product_id) {
            $cart = $request->session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                $request->session()->put('cart', $cart);
                $request->session()->flash('alert-success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
            }
        }
    }

    public function showFormCheckOut()
    {
        if(session('cart')) {
            return view('product.checkout');
        }
        return view('404');
    }

}
