<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;


class AdminBlogController extends Controller{

    public function index(Request $request){
        $blog  = Blog::latest()->paginate(10);
        return view('admins.blogs.index',compact('blog'));
    }
    // show all data -------------------
    public function create(){
        return view('admins.blogs.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request){
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        $post = Blog::updateOrCreate([
            'id' => $request->id,
        ], [
            'title' => $request->title ?? '',
            'description' => $request->description?? '',
            'user_id' => auth()->user()->id,
        ]);
        
        return redirect()->route('blog.index')->withSuccess('Blog add  successfully !');
    }
    // edit function--------------------------
    public function edit($id){    
        $privacy = Blog::findOrFail($id);
        return view('admins.blogs.edit',compact('privacy'));
    }

    // public function upload(Request $request){
    //     if ($request->hasFile('upload')) {
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         $fileName = $fileName . '_' . time() . '.' . $extension;
    //         $request->file('upload')->move(public_path('image/blogs'), $fileName);
    //         $url = asset('image/blogs/' . $fileName);
    //         return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
    //     }
    // }

    public function upload(Request $request){
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('image/blogs'), $fileName);
            $url = asset('image/blogs/' . $fileName);
            
            // Add a fixed height to the image tag
            $imageTag = '<img src="' . $url . '" style="height: 250px;width:100%">';
            
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url, 'imageTag' => $imageTag]);
        }
    }
    

}
