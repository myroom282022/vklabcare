<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_id',
        'order_number',
        'product_name',
        'product_description',
        'product_price',
        'quantity',
        'product_image',
    ];

    public function orderDetails()
    {
        return $this->belongsTo(Payment::class);
    }
}
