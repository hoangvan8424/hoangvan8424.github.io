<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d H:i:s');

        $customer = Customer::whereDate('photography_date', $today)
            ->get();

        $product_demo = DB::table('product_demos')
        ->whereDate('receive_demo_date', $today)
            ->orWhereDate('expected_delivery_date_1', $today)
            ->orWhereDate('expected_delivery_date_2', $today)
            ->orWhereDate('expected_delivery_date_3', $today)
            ->orWhereDate('delivery_date', $today)
            ->get();

        $product_print = DB::table('product_prints')
            ->whereDate('review_date_1', $today)
            ->orWhereDate('review_date_2', $today)
            ->orWhereDate('review_date_3', $today)
            ->orWhereDate('closing_date', $today)
            ->orWhereDate('delivery_date_in_branch', $today)
            ->orWhereDate('customer_receive_date', $today)
            ->get();



        $array_today = [];
        $customer_today = [];
        foreach ($customer as $value) {
            if($value->photography_date == $today) {
                $array_today['photography_date'] =
                '<p>Khách hàng '.$value->name. '(mã hợp đồng: '.$value->contract_code.') chụp ảnh</p>;
                <p>(Thợ chụp: ' .$value->photographer->name .')</p>
                ';
            } else {
                $customer_today['photography_date'] = "<p></p>";
            }
        }

//        dd($array_today);

        foreach($product_demo as $value) {
            if($value->expected_delivery_date_1 == $today) {
                $array_today['expected_delivery_date_1'] ="";
            } else {
                $array_today['expected_delivery_date_1'] = "";
            }
            if($value->expected_delivery_date_2 == $today) {
                $array_today['expected_delivery_date_2'] = $value->expected_delivery_date_2;
            } else {
                $array_today['expected_delivery_date_2'] = "";
            }

            if($value->expected_delivery_date_3 == $today) {
                $array_today['expected_delivery_date_3'] = $value->expected_delivery_date_3;
            } else {
                $array_today['expected_delivery_date_3'] = "";
            }

            if($value->delivery_date == $today) {
                $array_today['delivery_date'] = $value->delivery_date;
            } else {
                $array_today['delivery_date'] = "";
            }

        }



        return view('admin.dashboard.v1');
    }
}
