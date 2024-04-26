<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->paginate(10);

        return view('transaction_history.index', compact('transactions'));
    }
}
