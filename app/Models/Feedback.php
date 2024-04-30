<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'review',
        'title',
        'description',
    ];
   
    public function feedbackData(){
        return $this->hasOne(User::class,'id' ,'user_id');
    }  
}
