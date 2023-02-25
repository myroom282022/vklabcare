<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Hash;
use Auth;

class AdminProfileController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $users= User::where('id',auth()->user()->id)->first();
        return view('admins.profile.index',compact('users'));
    } 

    public function update(Request $request)
    {  
       // return $request;

        $id=$request->id;
         $user = User::find($id);
        $validatedData= request()->validate([
            'name'          =>  'required',
            'email'         => 'required|unique:users,email,'.$user->id,
            'phone_number'  =>  'required|numeric|digits:10',
       ],[
            'name.required'         =>  'Please enter your name',
            'email.required'        =>  'Please enter your email',
            'email.email'           =>  'Please enter valid email',
            'email.unique'          =>  'This email is already exits',
            'phone_number.required' =>  'Please enter your phone number',
            'phone_number.min'      =>  'Please enter 10 digites  phone number',
        ]);
        $details = [
             'name' => $request->name,
             'email' => $request->email, 
             'phone_number' => $request->phone_number,
        ];
 
        if ($files = $request->file('user_image')) {
           //delete old file
            if($request->id){
                $data = User::findOrFail($request->id);
                $destinationPath = 'storage/users/img/'.$data->user_image;
                if(File::exists($destinationPath)){
                    File::delete($destinationPath);
                }
            }
            //insert new file
            $fileName = rand(0000,9999).time().'.'.$files->extension();  
            $path = 'storage/users/img/';
            $request->user_image->move($path, $fileName);
            $details['user_image'] = $fileName;
        } 
        User::where('id',$id)->update($details);      
        return redirect()->back()->withSuccess('Users Updated successfully');
    } 

    public function changePassword()
    {
        return view('admins.profile.change_password');
    } 
    public function ChangePasswordPost(Request $request)
   {
       $validatedData= request()->validate([
         'current_password'        =>'required',
         'new_password'         =>'required|min:6|max:30',
         'confirm_password' =>'required|same:new_password'
        ],[
            'current_password.required'     =>  'Please enter Current Passsword',
            'new_password.required'         =>  'Please enter New password',
            'new_password.min'              =>  'Please enter minimum 6 characters ',
            'new_password.max'              =>  'Please enter minimum 30 characters ',
            'confirm_password.required'     =>  'Please enter Confirm Passsword',
            'confirm_password.same'         =>  'Please enter confirm and new  Passsword same',
        ]);
        $user=$request->user();
      if (Hash::check($request->current_password,$user->password)) {
            User::where('id',auth()->user()->id)->update(['password'=>Hash::make($request->new_password) 
        ]);
        Auth::logout();
        }else{
            return redirect()->back()->withError('Current Password is Worng');
        }
        return redirect('/')->withSuccess('Users Updated successfully !'); 

    }
}
