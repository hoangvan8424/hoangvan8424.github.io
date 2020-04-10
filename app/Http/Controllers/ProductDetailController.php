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
                    're_spam' => 0,
                    'product_id' => $id
                ])->orderByDesc('id')->paginate(10);



            $numberRating = DB::table('reviews')
                                ->join('products', 'products.id', '=', 'reviews.product_id')
                                ->select('re_rating', DB::raw('COUNT(re_rating) as star'))
                                ->where('product_id', $id)
                                ->groupBy('product_id', 're_rating')->get();

<<<<<<< HEAD
//          Chuyển số sao vào mảng
=======
>>>>>>> 56b6bbea56655726a63014092bc412f443813dd6
            $arrRating = [];
            if(!empty($numberRating)) {
                for($i = 5; $i >= 1; $i--) {
                    $arrRating[$i] = 0;
                    foreach ($numberRating as $item) {
                        if($item->re_rating == $i) {
                            $arrRating[$i] = $item->star;
                            continue;
                        }
                    }
                }
            }

<<<<<<< HEAD
//          Tính số sao trung bình
            $calculateRating = $this->countRating($product->pro_rating_count, $product->pro_rating_total);
=======
            $calculateRating = $this->countRating($product->pro_rating_count, $product->pro_rating_total);
//            dd($arrRating);
>>>>>>> 56b6bbea56655726a63014092bc412f443813dd6
            $viewData = [
                'product' => $product,
                'review' => $review,
                'listRating' => $arrRating,
                'calculateRating' => $calculateRating
            ];

            return view('product.product-details', $viewData);
        }
        return view('404');
    }

    public function countRating($ratingCount, $ratingTotal)
    {
        if($ratingCount>0) {
             return round($ratingTotal/$ratingCount, 1);
        }
        else return 0;
    }
}
