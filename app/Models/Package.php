<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_name',
        'package_description',
        'package_price',
        'package_discount_price',
        'package_image',
    ];
}
