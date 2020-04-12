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
                ->join('brands', 'brand_id', '=', 'brands.id')
                ->select('*', 'brands.id as brandId', 'products.id as productId')
                ->where([
                    ['products.id', '=', $id],
                    ['pro_active', '=', Product::PUBLIC_STATUS],
                    ['pro_number', '>', 0]
                ])->first();

            $review = Review::with('product', 'user')
                ->where([
                    're_approved' => 1,
                    're_spam' => 0,
                    'product_id' => $id
                ])->orderByDesc('id')->paginate(10);

//          Lấy ra danh sách đánh giá
            $arrRating = $this->getListRating($id);

//          Tính số sao trung bình
            $calculateRating = $this->countRating($product->pro_rating_count, $product->pro_rating_total);

//          Sản phẩm cùng danh mục
            $suggestProduct = $this->suggest($product->pro_category_id, $product->brandId, $id);
//            dd($suggestProduct);

            $viewData = [
                'product' => $product,
                'review' => $review,
                'listRating' => $arrRating,
                'calculateRating' => $calculateRating,
                'suggestProduct' => $suggestProduct
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

    public function suggest($category, $brand, $currentId)
    {
        return DB::table('products')
            ->where([
                ['pro_category_id', $category],
                ['brand_id', $brand],
                ['pro_number', '>', 0]
            ])->paginate(10);
    }

    public function getListRating($id)
    {
        $numberRating = DB::table('reviews')
            ->join('products', 'products.id', '=', 'reviews.product_id')
            ->select('re_rating', DB::raw('COUNT(re_rating) as star'))
            ->where('product_id', $id)
            ->groupBy('product_id', 're_rating')->get();

//          Chuyển số sao vào mảng
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
        return $arrRating;
    }
}
