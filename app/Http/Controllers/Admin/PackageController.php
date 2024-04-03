<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageCategory;
use File;

class PackageController extends Controller
{
    // show all data -------------------
    public function index(){
       $package= Package::latest()->paginate(10);
        return view('admins.package.index',compact('package'));
    } 

    // show all data -------------------
    public function create(){
       $package= PackageCategory::latest()->get();
       $package = $package ?? '';
       return view('admins.package.create',compact('package'));
    } 

    // store and update funcinality data ---------------------
    public function store(Request $request){  
   
        $validatedData= request()->validate([
            'package_name'          =>  'required|unique:packages,package_name,',
            'package_description'   =>  'required',
            'package_price'         =>  'required|numeric',
            'package_discount_price'=>  'required|numeric',
            'package_image'         =>  'required',
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
            $path = 'public/storage/package/img';
            $request->package_image->move($path, $fileName);
            $details['package_image'] = "$fileName";
        } 
         $slugName = str_replace(' ', '-', $request->package_name);
         $details['package_slug_name'] = $slugName.time();
        Package::create($details);      
        return redirect()->route('package.index')->withSuccess('Package Add successfully');
    } 

    // edit function--------------------------
    public function edit($id){    
        $package = Package::findOrFail($id);
        $packageCategory= PackageCategory::latest()->get();
        $packageCategory = $packageCategory ?? '';
        $package = $package ?? '';
        return view('admins.package.edit',compact('package','packageCategory'));
    }

     // store and update funcinality data ---------------------
     public function update(Request $request){  
         $id=$request->id;
         $validatedData= request()->validate([
            'package_category_name' =>  'required',
            'package_name'          =>  'required',
            'package_description'   =>  'required',
            'description_not_add'   =>  '',
            'package_price'         =>  'required|numeric',
            'package_discount_price'=>  'required|numeric',
            'package_type'          =>  'required',
            'package_category_name' =>  'required',
            'package_discount_percentage' =>  'required',
            'total_test' =>  'required',

       ],[
            'package_category_name.required'=>  'Please selectpackage category name',
            'package_name.required'         =>  'Please enter your name',
            'package_description.required'  =>  'Please enter your description',
            'package_price.required'        =>  'Please enter price',
            'package_price.numeric'         =>  'Please enter price only numeric',
            'package_discount_price.required'=>  'Please enter price',
            'package_discount_price.numeric'=>  'Please enter price only numeric',
            'package_image.required'        =>  'Please upload images',
            'package_type.required'        =>  'Please select',
        ]);
        $details=$validatedData;
        
        $data = Package::findOrFail($id);
         if ($files = $request->file('package_image')) {
            //delete old file
                 $destinationPath = 'public/storage/package/img/'.$data->package_image;
                 if(File::exists($destinationPath)){
                     File::delete($destinationPath);
                 }
             //insert new file
             $fileName = rand(0000,9999).time().'.'.$files->extension();  
             $path = 'public/storage/package/img';
             $request->package_image->move($path, $fileName);
             $details['package_image'] = $fileName;
         }  
         if($request->package_name != $data->name){
            $slugName = str_replace(' ', '-', $request->package_name);
            $details['package_slug_name'] = $slugName.time();
         }
         Package::where('id',$id)->update($details);      
         return redirect()->route('package.index')->withSuccess('Package Updated successfully');
     } 

    // delete funconality --------------------------
    public function destroy($id) {
        $data = Package::findOrFail($id);
        $destinationPath = 'public/storage/users/img/'.$data->user_image;
        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }
        $data->delete();
        return redirect()->back()->withSuccess('Users Deleted successfully');
    }
}
