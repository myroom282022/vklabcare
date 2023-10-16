<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PackageCategory;

class PackageCategoryController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $package= PackageCategory::latest()->paginate(10);
        return view('admins.package_category.index',compact('package'));
    } 
    // show all data -------------------
    public function create(){
        return view('admins.package_category.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request)
    {  
        $validatedData= request()->validate([
            'package_category_name' => 'required|unique:package_categories,package_category_name,',
       ],[
            'package_category_name.required' => 'Please enter your name',
        ]);

        $details= [
            'package_category_name' => $request->package_category_name,
            'user_id' => auth()->user()->id,
        ];
        PackageCategory::create($details);      
        return redirect()->route('package-category.index')->withSuccess('Package Add successfully');
    } 

    // edit function--------------------------
    public function edit($id)
    {    
        $package = PackageCategory::findOrFail($id);
         return view('admins.package_category.edit',compact('package'));

    }
     // store and update funcinality data ---------------------
     public function update(Request $request)
     {  
         $id=$request->id;
         $validatedData= request()->validate([
            'package_category_name' =>  'required',
       ],[
            'package_category_name.required' =>  'Please enter your name',
        ]);
        $details= [
            'package_category_name' => $request->package_category_name,
            'user_id' => auth()->user()->id,
        ];
        PackageCategory::where('id',$id)->update($details);      
         return redirect()->route('package-category.index')->withSuccess('Package Updated successfully');
     } 
    // delete funconality --------------------------
    public function destroy($id) 
    {
        $data = PackageCategory::findOrFail($id);
        $data->delete();
        return redirect()->back()->withSuccess('Package Deleted successfully');
    }
}
