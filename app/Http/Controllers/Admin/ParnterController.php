<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use File;

class ParnterController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $slider= Partner::latest()->paginate(10);
        return view('admins.partner.index',compact('slider'));
    } 
    // show all data -------------------
    public function create()
    {
        return view('admins.partner.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request)
    {  
        if(empty($request->id)){

            $validatedData= request()->validate([
                'partner_image'  =>  'required|image|mimes:jpg,png,jpeg',
                'partner_url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],

            ],[
                'partner_image.required'    =>  'Please upload images ',
                'partner_image.mimes'    =>  'Please upload images only  jpg png jpeg',
                'partner_url.required'    =>  'Please enter url',
                'partner_url.url'    =>  'Please enter valid url',

            ]);
        }else{
            $validatedData= request()->validate([
                'partner_image'  =>  'mimes:jpg,png,jpeg',
                'partner_url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            ],[
                'partner_image.mimes'    =>  'Please upload images only  jpg png jpeg',
                'partner_url.url'    =>  'Please enter valid url',
            ]);
        }
         $details = [
             'partner_url' => $request->partner_url, 
             'user_id' => auth()->user()->id, 
        ];
 
        if ($files = $request->file('partner_image')) {
            //delete old file
            if($request->id){
                $data = $request->hidden_image;
                $destinationPath = 'public/storage/partner/img/'.$data;
                if(File::exists($destinationPath)){
                    File::delete($destinationPath);
                }
            }
             $fileName = rand(0000,9999).time().'.'.$files->extension();  
            $path = 'public/storage/partner/img';
            $request->partner_image->move($path, $fileName);
            $details['partner_image'] = "$fileName";
        } 
        if($request->id){
            $data= Partner::where('id',$request->id)->update($details);      
            return redirect()->route('partner.index')->withSuccess('Partner updated successfully');
        }else{
            $data= Partner::create($details);      
            return redirect()->route('partner.index')->withSuccess('Partner Add successfully');
        }
    } 

    // edit function--------------------------
    public function edit($id){    
        $slider = Partner::findOrFail($id);
        return view('admins.partner.edit',compact('slider'));

    }
     
    // delete funconality --------------------------
    public function destroy($id) 
    {
        $data = Partner::findOrFail($id);
        $destinationPath = 'public/storage/partner/img/'.$data->partner_image;
        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }
        $data->delete();
        return redirect()->back()->with('Partner Deleted successfully');
    }
}
