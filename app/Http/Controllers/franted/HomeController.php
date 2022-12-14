<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Package;


class HomeController extends Controller
{
    public function index(){
         $slider=Slider::latest()->paginate(3);
         $package=Package::latest()->paginate(5);
        return view('franted.home.index',compact('slider','package'));
    }

    // public function slider(){
    //     return view('franted.home.index');
    // }
}
