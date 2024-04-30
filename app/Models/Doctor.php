<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'medical_specialization',
        'medical_license_no',
        'total_experience',
        'clinic_name',
        'education_degree',
    ];

    public function getDoctorData(){
        return $this->belogsTo(User::class, 'id','user_id');
    }
}
