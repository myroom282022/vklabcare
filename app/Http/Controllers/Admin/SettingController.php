<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;

class SettingController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $contactData= ContactInfo::latest()->paginate(10);
        return view('admins.setting.index',compact('contactData'));
    } 
    // show all data -------------------
    public function create()
    {
        return view('admins.setting.create');
    } 
    // store  funcinality data ---------------------
    public function store(Request $request)
    {  
        $details = [
             'email' => $request->email,
             'phone' => $request->phone, 
             'address' => $request->address, 
        ];
 
            $data= ContactInfo::create($details);      
            return redirect()->route('contact-info.index')->withSuccess(' Add successfully');
    } 

    // edit function--------------------------
    public function edit($id){    
        $ContactData = ContactInfo::findOrFail($id);
        return view('admins.setting.edit',compact('ContactData'));
    }
    //  update funcinality data ---------------------
    public function update(Request $request)
    {  
        $details = [
             'email' => $request->email,
             'phone' => $request->phone, 
             'address' => $request->address, 
        ];
            $data= ContactInfo::where('id',$request->id)->update($details);      
            return redirect()->route('contact-info.index')->withSuccess(' updated successfully');
    } 
    // delete funconality --------------------------
    public function destroy($id) {
        $data = ContactInfo::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('Deleted successfully');
    }
}
