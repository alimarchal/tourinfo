<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_id',
        'details',
        'amount',
        'transaction_particulars',
        'transaction_date',
        'status',
        'payload',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}