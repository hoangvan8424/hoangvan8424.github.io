<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowProductController extends Controller
{
    public function getAllProduct(Request $request) {

        $attrSeach = $request->except('title_search', 'page', 'price', 'orderby');

        // category
        $attrSeach = array_values($attrSeach);

        $product = DB::table('products')->where('active', '=', true);

        if($request->title_search != null) {
            $product->where('name', 'like', '%'.$request->title_search.'%');
        }

        if($request->price != null) {
            $price = $request->price;
            switch ($price) {
                case 1:
                    $product = $product->where('price', '<', '5000000');
                    break;
                case 5:
                    $product = $product->where('price', [5000000, 7000000]);
                    break;
                case 7:
                    $product = $product->where('price', [7000000, 10000000]);
                    break;
                case 10:
                    $product = $product->where('price', '>', 10000000);
                    break;
            }
        }

        // category
        if(count($attrSeach) > 0) {
            $product = $product->whereIn('category_id', $attrSeach);
        }

        if($request->orderby != null) {
            $orderBy = $request->orderby;
            switch ($orderBy) {
                case 1:
                    $product = $product->orderBy('id', 'ASC');
                    break;
                case 2:
                    $product = $product->orderByDesc('created_at');
                    break;
                case 3:
                    $product = $product->orderBy('price', 'ASC');
                    break;
                case 4:
                    $product = $product->orderByDesc('price');
                    break;
            }

            $product = $product->paginate(9);
        } else {
            $product = $product->orderByDesc('id')->paginate(9);
        }

        $category = Category::where([
            'active' => true,
        ])->get();

        $productNew = Product::where([
            'type' => 1,
            'active' => 1
        ])->orderBy('updated_at', 'DESC')->take(6)->get();

        $data = [
            'product' => $product,
            'category'  => $category,
            'productNew'=> $productNew,
        ];

        return view('product.all', $data);
    }

    public function getDetailProduct($slug) {
        $detail = Product::where([
            'slug' => $slug,
        ])->first();

        $category = Category::where([
            'active' => true,
        ])->get();

        $productSameCategory = Product::where([
            ['category_id', '=', $detail->category_id],
            ['id', '!=', $detail->id],
            ['active', '=', true],
        ])->paginate(7);

        $data = [
            'detail' => $detail,
            'category'  => $category,
            'productSameCategory' => $productSameCategory,
        ];
        return view('product.detail', $data);
    }

    public function getProductWithCategory($slug, Request $request) {

        $category = Category::where([
            'slug' => $slug,
            'active' => true,
        ])->first();

        $category_id = $category->id;

        $product = Product::where([
            'category_id' => $category_id,
            'active' => true,
        ]);

        if($request->title_search != null) {
            $product->where('name', 'like', '%'.$request->title_search.'%');
        }

        if($request->price != null) {
            $price = $request->price;
            switch ($price) {
                case 1:
                    $product = $product->where('price', '<', 5000000);
                    break;
                case 5:
                    $product = $product->where('price', [5000000, 7000000]);
                    break;
                case 7:
                    $product = $product->where('price', [7000000, 10000000]);
                    break;
                case 10:
                    $product = $product->where('price', '>', 10000000);
                    break;
            }
        }

        if($request->orderby != null) {
            $orderBy = $request->orderby;
            switch ($orderBy) {
                case 1:
                    $product = $product->orderBy('id', 'ASC');
                    break;
                case 2:
                    $product = $product->orderByDesc('created_at');
                    break;
                case 3:
                    $product = $product->orderBy('price', 'ASC');
                    break;
                case 4:
                    $product = $product->orderByDesc('price');
                    break;
            }

            $product = $product->paginate(12);
        } else {
            $product = $product->orderByDesc('id')->paginate(12);
        }


        $category = Category::where([
            'active' => true,
        ])->get();

        $productNew = Product::where([
            ['type', '=', 1],
            ['active', '=', 1],
            ['category_id', '!=', $category_id],
        ])->orderBy('created_at', 'DESC')->take(6)->get();


        $data = [
            'product' => $product,
            'category' => $category,
            'productNew' => $productNew,
        ];

        return view('product.category', $data);
    }
}
