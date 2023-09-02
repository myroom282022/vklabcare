<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_id',
        'order_id',
        'total_price',
        'payment_type',
        'order_number',
        'status',
        'currency',
        'description',
        'vpa',
        'upi_transaction_id',
        'card_details',
    ];
    public function paymentDetails(){
        return $this->hasMany(Order::class);
    }
}
