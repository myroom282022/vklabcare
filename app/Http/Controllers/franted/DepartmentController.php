<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        return view('franted.departments.index');
    }
    public function singlePage(){
        return view('franted.departments.singlepage');
    }
}
