<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use File;
use Illuminate\Validation\Rule; //import Rule class 
use Validator;
class UsersController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $data= User::whereNot('role', 'admin')->latest()->paginate(10);
        return view('admins.users.index',compact('data'));
    } 
    // show all data -------------------
    public function create()
    {
        return view('admins.users.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request)
    {  

        $validatedData= request()->validate([
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'phone_number'  =>  'required|numeric|digits:10',
            'password'      =>  'required|min:8',
            'role'          =>  'required',
       ],[
            'name.required'         =>  'Please enter your name',
            'password.required'     =>  'Please enter your password',
            'password.min'     =>  'Please enter 8 digits password',
            'email.required'        =>  'Please enter your email',
            'email.email'           =>  'Please enter valid email',
            'email.unique'          =>  'This email is already exits',
            'phone_number.required' =>  'Please enter your phone number',
            'phone_number.digits'      =>  'Please enter 10 digites  phone number',
            'role.required'      =>  'Please select role',
        ]);
 
        $details = [
             'name' => $request->name ?? '',
             'email' => $request->email ?? '', 
             'phone_number' => $request->phone_number ?? '',
             'role' => $request->role ?? '',
             'password' => Hash::make($request->password ?? '123456'),
             'referral_code'=> $this->generateReferralCode(),
        ];
        if ($files = $request->file('user_image')) {
            //insert new file
             $fileName = rand(0000,9999).time().'.'.$files->extension();  
            $path = 'public/storage/users/img/';
            $request->user_image->move($path, $fileName);
            $details['user_image'] = $fileName;
        } 
        User::create($details);      
        return redirect()->route('users.index')->withSuccess('Users Add successfully');
    } 

     // referral code generate 
     function generateReferralCode($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }

    // edit function--------------------------
    public function edit($id)
    {    
        $users = User::findOrFail($id);
        return view('admins.users.edit',compact('users'));

    }
     // store and update funcinality data ---------------------
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
             'password.required'     =>  'Please enter your password',
             'password.required'     =>  'Please enter 6 digits password',
             'email.required'        =>  'Please enter your email',
             'email.email'           =>  'Please enter valid email',
             'email.unique'          =>  'This email is already exits',
             'phone_number.required' =>  'Please enter your phone number',
             'phone_number.min'      =>  'Please enter 10 digites  phone number',
 
 
         ]);
         $details = [
             'name' => $request->name ?? '',
             'email' => $request->email ?? '', 
             'phone_number' => $request->phone_number ?? '',
             'role' => $request->role ?? '',
             'referral_code'=> $this->generateReferralCode(),
        ];
  
         if ($files = $request->file('user_image')) {
            //delete old file
             if($request->id){
                 $data = User::findOrFail($request->id);
                 $destinationPath = 'public/storage/users/img/'.$data->user_image;
                 if(File::exists($destinationPath)){
                     File::delete($destinationPath);
                 }
             }
             //insert new file
             $fileName = rand(0000,9999).time().'.'.$files->extension();  
             $path = 'public/storage/users/img/';
             $request->user_image->move($path, $fileName);
             $details['user_image'] = $fileName;
         } 
         User::where('id',$id)->update($details);      
         return redirect()->route('users.index')->withSuccess('Users Updated successfully');
     } 
    // delete funconality --------------------------
    public function destroy($id) 
    {
        $data = User::findOrFail($id);
        $destinationPath = 'public/storage/users/img/'.$data->user_image;
        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }
        $data->delete();
        return redirect()->back()->withSuccess('Users Deleted successfully');
    }
}
