<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appoinment;

class AllAppontmentController extends Controller
{
    public function index()
    {
       $appointments= Appoinment::latest()->paginate(10);
        return view('admins.appontments.index',compact('appointments'));
    } 
}
