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
        'total_price',
        'product_price',
        'discount_price',
        'delivery_charge',
        'quantity',
        'status',
        'order_number',
        'order_id',
        'payment_type',
        
    ];
    public function paymentDetails(){
        return $this->hasMany(Order::class);
    }
}
