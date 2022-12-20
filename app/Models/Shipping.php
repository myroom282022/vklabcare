<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shipping_name',
        'shipping_email',
        'shipping_phone_number',
        'shipping_city',
        'shipping_zip_code',
        'shipping_address',
        'shipping_state',
        'shipping_country',
    ];
}
