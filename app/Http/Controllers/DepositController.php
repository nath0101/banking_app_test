<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session; 

class DepositController extends Controller
{
    public function showDepositForm()
    {
        return view('deposit.deposit');
    }

    public function processDeposit(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:500'],
        ], [
            'amount.min' => 'The minimum deposit amount is 500.',
        ]);

        $user = auth()->user();
        $user->balance += $request->amount;
        $user->save();

        Transaction::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'type' => 'credit',
        ]);

        Session::flash('success', 'Deposit successful!');

        return redirect()->route('deposit'); 
    }
}
