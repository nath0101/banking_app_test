<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\TransactionHistoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/deposit', [DepositController::class, 'showDepositForm'])->name('deposit');
    Route::post('/deposit', [DepositController::class, 'processDeposit'])->name('deposit.process');
    Route::get('/withdraw', [WithdrawController::class, 'showWithdrawForm'])->name('withdraw');
    Route::post('/withdraw', [WithdrawController::class, 'processWithdraw'])->name('withdraw.process');
    Route::get('/transaction-history', [TransactionHistoryController::class, 'index'])->name('transaction_history');

});



