<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function changeStatus($id)
    {
        $transaction = Transaction::find($id);
        $order = Order::with('transaction')->where('transaction_id', $id)->get();
        foreach ($order as $key => $value) {
            $product = Product::find($value->product_id);
            if($product->pro_number > 0) {
                $product->pro_number -= $value->or_quantity;
                $product->pro_purchase_number += $value->or_quantity;
                $product->save();
            }
            else {
                return redirect()->back()->with('alert-danger', 'Xin lỗi. Không thể xử lý đơn hàng. Sản phẩm tạm hết hàng!');
            }

        }
        $transaction->tr_status = 1;
        $transaction->save();
        return redirect()->back()->with('alert-success', 'Đơn hàng đã được xử lý thành công!');

    }
}
