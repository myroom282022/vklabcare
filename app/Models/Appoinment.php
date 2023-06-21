<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'speciality',
        'doctor_name',
        'available_date',
        'available_time',
        'patient_name',
        'gender',
        'patient_age',
        'patient_phone_number',
        'patient_problem',
    ];
    
}

