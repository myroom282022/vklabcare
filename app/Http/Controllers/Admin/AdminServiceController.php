<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use File;

class AdminServiceController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $slider= Service::latest()->paginate(10);
        return view('admins.service.index',compact('slider'));
    } 
    // show all data -------------------
    public function create()
    {
        return view('admins.service.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request)
    {  
        if(empty($request->id)){

            $validatedData= request()->validate([
                'image_name'  =>  'required|image|mimes:jpg,png,jpeg',
            ],[
                'image_name.required'    =>  'Please upload images ',
                'image_name.mimes'    =>  'Please upload images only  jpg png jpeg',
            ]);
        }else{
            $validatedData= request()->validate([
                'image_name'  =>  'mimes:jpg,png,jpeg',
            ],[
                'image_name.mimes'    =>  'Please upload images only  jpg png jpeg',
            ]);
        }
        $details = [
             'title' => $request->title,
             'description' => $request->description, 
             'user_id' => auth()->user()->id ?? '', 
        ];
        
        if ($files = $request->file('image_name')) {
            //delete old file
            if($request->id){
                $data = Service::findOrFail($request->id);
                $destinationPath = 'public/storage/service/img/'.$data->image_name;
                if(File::exists($destinationPath)){
                    File::delete($destinationPath);
                }
            }
            $fileName = rand(0000,9999).time().'.'.$files->extension();  
            $path = 'public/storage/service/img';
            $request->image_name->move($path, $fileName);
            $details['image_name'] = $fileName;
        } 
        if($request->id){
            $data= Service::where('id',$request->id)->update($details);      
            return redirect()->route('service.index')->withSuccess('service updated successfully');
        }else{
            $data= Service::create($details);      
            return redirect()->route('service.index')->withSuccess('service Add successfully');
        }
    } 

    // edit function--------------------------
    public function edit($id)
    {    
        $slider = Service::findOrFail($id);
        return view('admins.service.edit',compact('slider'));

    }

    // delete funconality --------------------------
    public function destroy($id) 
    {
        $data = Service::findOrFail($id);
        $destinationPath = 'public/storage/service/img/'.$data->slider_image;
        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }
        $data->delete();
        return redirect()->back()->with('service Deleted successfully');
    }
}
