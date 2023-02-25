<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_email_verified',
        'is_phone_verified',
        'address',
        'city',
        'address',
        'zip_code',
        'state',
        'country',
    ];
}
