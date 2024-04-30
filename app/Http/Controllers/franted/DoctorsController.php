<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;

class DoctorsController extends Controller
{
    public function index(){
    //    return $data = User::with('getUserDetails','getDoctor')->where('role', 'doctor')->latest()->paginate(10);
        $doctor = User::with('getUserDetails','getDoctor')->where('role', 'doctor')->latest()->paginate(10);
        return view('franted.doctors.index',compact('doctor'));
    }
    public function singlePage($id){
        $doctor = User::with('getUserDetails','getDoctor')->where('id',$id)->first();
        return view('franted.doctors.singlepage',compact('doctor'));
    }
    public function appoinment(){
        
        return view('franted.doctors.appoinment');
    }
}
