<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function save(Request $request)
    {
        if($request->ajax()) {
            $productId = $request->id;
            $star = $request->star;
            $comment = $request->comment;

            $product = Product::find($productId);
            $product->pro_rating_count += 1;
            $product->pro_rating_total += $star;
            $product->save();

            $review = new Review();
            $review->product_id = $productId;
            $review->user_id = get_data_user('web');
            $review->re_rating = $star;
            $review->re_comment = $comment;
            $review->save();
            session()->flash('alert-success', 'Gửi đánh giá sản phẩm thành công!');
        }
    }
}
