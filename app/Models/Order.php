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
        'product_name',
        'product_description',
        'product_price',
        'quantity',
        'product_image',
        'discount_price',
        'delivery_charge',
        'total_price',
    ];
protected $appends =[
    'image'
];
    public function getImageAttribute(){
        return url('storage/product/img/').'/'.$this->product_image;
    }
    public function singleUserOrderPayment(){
        return $this->belongsTo(Payment::class ,'payment_id' ,'id');
    }
    public function orderDetails()
    {
        return $this->belongsTo(Payment::class);
    }
}
