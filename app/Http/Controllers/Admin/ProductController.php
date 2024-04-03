<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $product= Product::latest()->paginate(10);
        return view('admins.product.index',compact('product'));
    } 
    // show all data -------------------
    public function create()
    {
       $package= Package::latest()->get();
       if($package){
        return view('admins.product.create',compact('package'));
       }
       $package='';
       return view('admins.product.create',compact('package'));
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request)
    {  
        $validatedData= request()->validate([
            'product_name'          =>  'required',
            'package_name'          =>  'required',
            'product_description'   =>  'required',
            'product_price'         =>  'required|numeric',
            'product_discount_price'=>  'required|numeric',
            'product_image'         =>  'required|image|mimes:jpg,png,jpeg',
       ],[
            'product_name.required'         =>  'Please enter your name',
            'product_description.required'  =>  'Please enter your description',
            'product_price.required'        =>  'Please enter price',
            'product_price.numeric'         =>  'Please enter price only numeric',
            'product_discount_price.required'=>  'Please enter price',
            'product_discount_price.numeric'=>  'Please enter price only numeric',
            'product_image.required'        =>  'Please upload images',
            'product_image.mimes'           =>  'Please upload images only  jpg png jpeg',


        ]);

        $details=$request->all();
        if ($files = $request->file('product_image')) {
            $fileName = rand(0000,9999).time().'.'.$files->extension();  
            $path = 'public/storage/Product/img';
            $request->product_image->move($path, $fileName);
            $details['product_image'] = "$fileName";
        } 
        Product::create($details);      
        return redirect()->route('product.index')->withSuccess('Package Add successfully');
    } 

    // edit function--------------------------
    public function edit($id)
    {    
        $product = Product::findOrFail($id);
        $package= Package::latest()->get();
       if($package){
        return view('admins.product.edit',compact('product','package'));
       }
       $package='';
         return view('admins.product.edit',compact('product','package'));

    }
     // store and update funcinality data ---------------------
     public function update(Request $request)
     {  
         $id=$request->id;
         $validatedData= request()->validate([
            'product_name'          =>  'required',
            'package_name'          =>  'required',
            'product_description'   =>  'required',
            'product_price'         =>  'required|numeric',
            'product_discount_price'=>  'required|numeric',
            'product_image'         =>  'mimes:jpg,png,jpeg',
       ],[
            'product_name.required'         =>  'Please enter your name',
            'package_name.required'         =>  'Please select package name',
            'product_description.required'  =>  'Please enter your description',
            'product_price.required'        =>  'Please enter price',
            'product_price.numeric'         =>  'Please enter price only numeric',
            'product_discount_price.required'=>  'Please enter price',
            'product_discount_price.numeric'=>  'Please enter price only numeric',
            'product_image.mimes'           =>  'Please upload images only  jpg png jpeg',


        ]);
             $details['product_name'] = $request->product_name;
             $details['package_name'] = $request->package_name;
             $details['product_description'] = $request->product_description;
             $details['product_price'] = $request->product_price;
             $details['product_discount_price'] = $request->product_discount_price;

         if ($files = $request->file('product_image')) {
            //delete old file
             if($request->id){
                 $data = Product::findOrFail($request->id);
                 $destinationPath = 'public/storage/Product/img/'.$data->product_image;
                 if(File::exists($destinationPath)){
                     File::delete($destinationPath);
                 }
             }
             //insert new file
             $fileName = rand(0000,9999).time().'.'.$files->extension();  
             $path = 'public/storage/Product/img';
             $request->product_image->move($path, $fileName);
             $details['product_image'] = "$fileName";
         } 
          Product::where('id',$id)->update($details);      
         return redirect()->route('product.index')->withSuccess('Package Updated successfully');
     } 
    // delete funconality --------------------------
    public function destroy($id) 
    {
        // return $id;
        $data = Product::findOrFail($id);
        $destinationPath = 'public/storage/Product/img/'.$data->user_image;
        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }
        $data->delete();
        return redirect()->back()->withSuccess('Product Deleted successfully');
    }
}
