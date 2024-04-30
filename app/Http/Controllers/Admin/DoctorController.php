<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\UserDetails;
use File;

class DoctorController extends Controller
{
    // show all data -------------------
    public function index(){
         $data = User::with('getUserDetails','getDoctor')->where('role', 'doctor')->latest()->paginate(10);
        return view('admins.doctor.index',compact('data'));
    } 
    // show all data -------------------
    public function create(){
        return view('admins.users.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request){  
        $validatedData= request()->validate([
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'phone_number'  =>  'required|numeric|digits:10',
            'password'      =>  'required|min:6',
       ],[
            'name.required'         =>  'Please enter your name',
            'password.required'     =>  'Please enter your password',
            'password.min'     =>  'Please enter 6 digits password',
            'email.required'        =>  'Please enter your email',
            'email.email'           =>  'Please enter valid email',
            'email.unique'          =>  'This email is already exits',
            'phone_number.required' =>  'Please enter your phone number',
            'phone_number.digits'      =>  'Please enter 10 digites  phone number',


        ]);
 
        $details = [
             'name' => $request->name,
             'email' => $request->email, 
             'phone_number' => $request->phone_number,
             'password' => Hash::make($request->password),
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

    // edit function--------------------------
    public function edit($id){    
        // $users = User::findOrFail($id);
        $users = User::with('getUserDetails','getDoctor')->where('id', $id)->first();
        return view('admins.doctor.edit',compact('users'));

    }
     // store and update funcinality data ---------------------
     public function update(Request $request){  
        // return $request;
          $id=$request->id;
          $user = User::find($id);
         $validatedData= request()->validate([
             'name'          =>  'required',
             'email'         => 'required|unique:users,email,'.$user->id,
             'phone_number'  =>  'required|numeric|digits:10',
             'dob'  =>  'required',
             'total_experience'  =>  'required|numeric|digits:2',
             'gender'  =>  'required',
             'address'  =>  'required',
             'city'  =>  'required',
             'zip_code'  =>  'required',
             'state'  =>  'required',
             'country'  =>  'required',
        ]);
         $details = [
            'name' => $request->name ?? '',
            'email' => $request->email ?? '', 
            'phone_number' => $request->phone_number ?? '',
            'role' => 'doctor' ?? '',
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
         User::where('id',$request->id)->update($details); 

         $educationDegrees = $request->has('education_degree') ? json_encode($request->education_degree) : null;
         $medicalSpecializations = $request->has('medical_specialization') ? json_encode($request->medical_specialization) : null;
       // Update or create doctor record
        Doctor::updateOrCreate(
            ['user_id' => $request->id],
            [
                'medical_specialization' => $medicalSpecializations ?? '',
                'total_experience' => $request->total_experience ?? '',
                'education_degree' => $educationDegrees ?? '',
                'clinic_name' => $request->clinic_name ?? '',
                'medical_license_no' => $request->medical_license_no ?? '',
            ]
        );

        // Update or create user details record
         UserDetails::updateOrCreate(
            ['user_id' => $request->id],
            [
                'gender' => $request->gender ?? '',
                'dob' => $request->dob ?? '',
                'address' => $request->address ?? '',
                'city' => $request->city ?? '',
                'zip_code' => $request->zip_code ?? '',
                'state' => $request->state ?? '',
                'country' => $request->country ?? '',
            ]
        );
             

         return redirect()->route('doctor.index')->withSuccess('Doctor Updated successfully');
     } 
    // delete funconality --------------------------
    public function destroy($id) {
        $data = Doctor::findOrFail($id);
        User::where('id',$data->user_id)->update(['role' => 'User']); 
        // $data->delete();
        return redirect()->back()->withSuccess('Doctor Deleted successfully');
    }
}
