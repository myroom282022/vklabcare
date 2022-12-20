<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'billing_name',
        'billing_email',
        'billing_phone_number',
        'billing_city',
        'billing_zip_code',
        'billing_address',
        'billing_state',
        'billing_country',
    ];
}
