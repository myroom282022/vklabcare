<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('franted.blog.index');
    }
    public function singlePage(){
        return view('franted.blog.singlepage');
    }
}
