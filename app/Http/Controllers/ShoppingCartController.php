<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShoppingCartController extends FrontendController
{
    public function index()
    {
        return view('product.cart');
    }

    public function addToCart( Request $request)
    {
        if($id=$request->id and $quantity=$request->quantity) {
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
                        "quantity" => $quantity,
                        "price" => $product->pro_price,
                        "sale" => $product->pro_sale,
                        "photo" => $product->pro_avatar,
                        "slug" => $product->pro_slug
                    ]
                ];
                session()->put('cart', $cart);
                session()->flash('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
            }
            else {
                //  Nếu giỏ hàng không trống và đã tồn tại sản phẩm đó, tăng số lượng lên 1
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] += $quantity;
                    session()->put('cart', $cart);
                    session()->flash('alert-success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
                }
                else {
                    //  Nếu giỏ hàng không trống và sản phẩm không tồn tại trong giỏ hàng, thì số lượng là 1
                    $cart[$id] = [
                        "name" => $product->pro_name,
                        "quantity" => $quantity,
                        "price" => $product->pro_price,
                        "sale" => $product->pro_sale,
                        "photo" => $product->pro_avatar,
                        "slug" => $product->pro_slug
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

    public function checkout()
    {
        return view('product.checkout');
    }
}
