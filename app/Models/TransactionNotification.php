<?php

// app/Models/TransactionNotification.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'email',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}

