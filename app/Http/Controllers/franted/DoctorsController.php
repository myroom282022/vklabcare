<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index(){
        return view('franted.doctors.index');
    }
    public function singlePage(){
        return view('franted.doctors.singlepage');
    }
    public function appoinment(){
        return view('franted.doctors.appoinment');
    }
}
