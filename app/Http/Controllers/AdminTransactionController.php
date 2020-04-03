<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::paginate(10);
        $viewData = [
            'transaction' => $transaction
        ];
        return view('admin.transaction.index', $viewData);
    }
}
