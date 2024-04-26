<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Validation\ValidationException;

class WithdrawController extends Controller
{
    public function showWithdrawForm()
    {
        return view('withdraw.withdraw');
    }

    public function processWithdraw(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:500', function ($attribute, $value, $fail) {
                $user = auth()->user();
                if ($value > $user->balance) {
                    $fail('The amount exceeds your current balance.');
                }
                if ($user->balance - $value < 500) {
                    $fail('Your balance cannot go below 500.');
                }
            }]
        ], [
            'amount.min' => 'The minimum withdrawal amount is 500.',
        ]);
        
        $user = auth()->user();
        $user->balance -= $request->amount;
        $user->save();
        
        Transaction::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'type' => 'debit',
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Withdrawal successful!');
    }
}