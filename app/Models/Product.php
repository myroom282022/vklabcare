<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_name',
        'product_name',
        'product_description',
        'product_price',
        'product_discount_price',
        'product_image',
    ];
}
