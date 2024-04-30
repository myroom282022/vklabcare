<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AboutController extends Controller
{
    public function index(){
        $doctor = User::with('getUserDetails','getDoctor')->where('role', 'doctor')->latest()->take(4)->get();
        return view('franted.abouts.index',compact('doctor'));
    }
}
