<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\User;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gender',
        'dob',
        'is_email_verified',
        'is_phone_verified',
        'address',
        'city',
        'address',
        'zip_code',
        'state',
        'country',
    ];
   

    public function getUserDetailsBeloge(){
        return $this->belongsTo(User::class,'id','user_id');
    }
}
