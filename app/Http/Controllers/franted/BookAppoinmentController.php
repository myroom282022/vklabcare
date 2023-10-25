<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appoinment;

class BookAppoinmentController extends Controller
{
    public function create(){
        return view('franted.Appoinment.bookApp');
    }
    public function store(Request $request){
        $available_date= $request->available_date;
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        
        $validatedData= request()->validate([
            'speciality'            =>  'required|not_in:0',
            'doctor_name'           =>  'required|not_in:0',
            'start_date'            =>  $yesterday,
            'available_date'        =>  'required|date_format:Y-m-d|after:start_date',
            'available_time'        =>  'required',
            'patient_name'          =>  'required',
            'gender'                =>  'required|in:Male,Female,Other',
            'patient_age'           =>  'required|numeric|min:1',
            'patient_phone_number'  =>  'required|digits:10',
            'patient_problem'       =>  'required|min :5',

       ],[
            'speciality.required'       =>  'Please select speciality',
            'speciality.not_in'       =>  'Please select speciality',
            'doctor_name.required'       =>  'Please select Doctor Name ',
            'doctor_name.not_in'       =>  'Please select Doctor Name',
            'available_date.required'  =>  'Please select calender  Date ',
            'available_date.date'  =>  'Please select only calender  Date ',
            'available_time.required'        =>  'Please select Time',
            'patient_name.required'         =>  'Please enter patient name',
            'gender.required'=>  'Please select gender',
            'gender.in'=>  'Please select gender (Male,Female,Other) in list',
            'patient_age.required'=>  'Please enter patient age',
            'patient_age.numeric'=>  'Please enter only number',
            'patient_age.min'=>  'Please enter minimum one digits',
            'patient_phone_number.required'         =>  'Please enter your phone number',
            'patient_problem.required'         =>  'Please write your problem',
        ]);
        $data=$request->all();
        Appoinment::create($data);
        return view('franted.Appoinment.confirmation')->withSuccess('Your appontment is booked Succesfully !');
    }
}
