<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::orderBy('id', 'desc')->paginate(10);
        $viewData = [
            'transaction' => $transaction
        ];
        return view('admin.transaction.index', $viewData);
    }

    public function viewDetailOrder(Request $request, $id)
    {
        if($request->ajax()) {
            $orderDetail = Order::with('product')->where('transaction_id', $id)->get();
            $html = view('admin.transaction.order', compact('orderDetail'))->render();
            return \response()->json($html);
//            return response()->json($orderDetail);
        }
    }
}
