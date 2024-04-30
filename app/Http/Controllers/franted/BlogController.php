<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
         $blog  = Blog::latest()->paginate(2);
        return view('franted.blog.index',compact('blog'));
    }
    public function singlePage(){
        return view('franted.blog.singlepage');
    }
}
