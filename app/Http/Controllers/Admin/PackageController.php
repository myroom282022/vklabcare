<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use File;

class PackageController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $package= Package::latest()->paginate(10);
        return view('admins.package.index',compact('package'));
    } 
    // show all data -------------------
    public function create()
    {
        return view('admins.package.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request)
    {  
        $validatedData= request()->validate([
            'package_name'          =>  'required|unique:packages,package_name,',
            'package_description'   =>  'required',
            'package_price'         =>  'required|numeric',
            'package_discount_price'=>  'required|numeric',
            'package_image'         =>  'required|image|mimes:jpg,png,jpeg',
       ],[
            'package_name.required'         =>  'Please enter your name',
            'package_description.required'  =>  'Please enter your description',
            'package_price.required'        =>  'Please enter price',
            'package_price.numeric'         =>  'Please enter price only numeric',
            'package_discount_price.required'=>  'Please enter price',
            'package_discount_price.numeric'=>  'Please enter price only numeric',
            'package_image.required'        =>  'Please upload images',
            'package_image.mimes'           =>  'Please upload images only  jpg png jpeg',


        ]);

        $details=$request->all();
        if ($files = $request->file('package_image')) {
            $fileName = rand(0000,9999).time().'.'.$files->extension();  
            $path = 'storage/Package/img';
            $request->package_image->move($path, $fileName);
            $details['package_image'] = "$fileName";
        } 
        Package::create($details);      
        return redirect()->route('package.index')->withSuccess('Package Add successfully');
    } 

    // edit function--------------------------
    public function edit($id)
    {    
        $package = Package::findOrFail($id);
         return view('admins.package.edit',compact('package'));

    }
     // store and update funcinality data ---------------------
     public function update(Request $request)
     {  
         $id=$request->id;
         $validatedData= request()->validate([
            'package_name'          =>  'required',
            'package_description'   =>  'required',
            'package_price'         =>  'required|numeric',
            'package_discount_price'=>  'required|numeric',
            'package_image'         =>  'required|image|mimes:jpg,png,jpeg',
       ],[
            'package_name.required'         =>  'Please enter your name',
            'package_description.required'  =>  'Please enter your description',
            'package_price.required'        =>  'Please enter price',
            'package_price.numeric'         =>  'Please enter price only numeric',
            'package_discount_price.required'=>  'Please enter price',
            'package_discount_price.numeric'=>  'Please enter price only numeric',
            'package_image.required'        =>  'Please upload images',
            'package_image.mimes'           =>  'Please upload images only  jpg png jpeg',


        ]);
        $details=$validatedData;
         if ($files = $request->file('package_image')) {
            //delete old file
             if($request->id){
                 $data = Package::findOrFail($request->id);
                 $destinationPath = 'storage/package/img/'.$data->package_image;
                 if(File::exists($destinationPath)){
                     File::delete($destinationPath);
                 }
             }
             //insert new file
             $fileName = rand(0000,9999).time().'.'.$files->extension();  
             $path = 'storage/package/img';
             $request->package_image->move($path, $fileName);
             $details['package_image'] = "$fileName";
         } 
         Package::where('id',$id)->update($details);      
         return redirect()->route('package.index')->withSuccess('Package Updated successfully');
     } 
    // delete funconality --------------------------
    public function destroy($id) 
    {
        $data = Package::findOrFail($id);
        $destinationPath = 'storage/users/img/'.$data->user_image;
        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }
        $data->delete();
        return redirect()->back()->withSuccess('Users Deleted successfully');
    }
}
