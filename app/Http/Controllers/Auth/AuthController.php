<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\UserOtp;
use App\Models\UserDetails;
use App\Mail\otpVerify;
use Hash;
use Mail;

class AuthController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   |User login and Register Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles the registration of new users as well as their
   | validation and creation. By default this controller uses a trait to
   | provide this functionality without requiring any additional code.
   |
   */
    public function userRegister(Request $request){
        $email = $request->query('email');
        return view('franted.Users.auth.register',compact('email'));
    }
   
    public function postRegister(Request $request){  
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users|digits:10' ,
        ], [
            'name.required' => 'Please enter your Name.',
            'password.required' => 'Please enter your Password.',
            'password.min' => 'Please enter min 6 digits.',
            'email.required' => 'Please enter your Email.',
            'email.unique' => 'Email is already exit',
            'email.email' => 'Email field must be email address.',
            'phone_number.unique' => 'Phone Number  is already exit',
            'phone_number.digits' => 'Please enter 10 digits number.',
            'phone_number.required' => 'Please enter your Phone Number.',
        ]);
        $data = $request->all();
        $user=  User::create([
            'name' => $data['name'],
            'role' => 'user',
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'referral_code'=> $this->generateReferralCode(),
            ]);
            $userData['user_id']=$user->id;
            UserDetails::create($userData);
            if($request->send_url){
                Auth::login($user);
                return redirect($request->send_url)->withSuccess("$user->name Registered Successfully");
            }else{
                $userOtp = $this->generateOtp($request->phone_number);
                $otp=  $userOtp->otp;
               // $userOtp->sendSMS($request->phone_number);
               $mailData = [
                   'title' => 'Mail for OTP verify ',
                   'otp' =>  $otp,
                   'verify_type' =>'phone',
                   'user_id'=>$user->id,
               ];
               Mail::to($user->email)->send(new otpVerify($mailData));
               return view('franted.Users.auth.otpVerification',compact('user'))->with('success',  "OTP has been sent on Your phone and email."); 
            }
        return redirect("otp/login")->withSuccess(' You have Registered Successfully');
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

  //login 
    public function login(){
        return view('franted.Users.auth.login');
    }  

    public function postLogin(Request $request){   
        if($request->email){
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))){
            $user=User::where('email',$request->email)->first();
            $userDetails=UserDetails::where('user_id',$user->id)->first();
            if($userDetails->is_phone_verified === 1 || $userDetails->is_email_verified === 1){
                Auth::login($user);
                if (auth()->user()->role == 'user') {
                    return redirect('/user/dashboard')->with('success', 'you are login successfully');
                }
                return redirect()->route('user-login')->with('error','Credencial not match');
            }else{
                    $phone_number=$user->phone_number;
                    $userOtp = $this->generateOtp($phone_number);
                    $otp=$userOtp->otp;
                    $mailData = [
                        'title' => 'Mail for OTP verify ',
                        'otp' =>  $otp,
                        'verify_type' =>'email',
                        'user_id'=>$user->id,
                    ];
                    Mail::to($user->email)->send(new otpVerify($mailData));
                    return view('franted.Users.auth.otpVerification',compact('user'))->with('success',  "OTP has been sent on Your phone and email."); 
            }
        }
            return redirect()->route('user-login')->with('error','Email-Address And Password Are Wrong.');

        }else{
            $input = $request->all();
            $this->validate($request, [
                'phone_number' => 'required|exists:users,phone_number'
            ]);
            $user=User::where('phone_number',$request->phone_number)->first();
            $userDetails=UserDetails::where('user_id',$user->id)->first();
            if($userDetails->is_phone_verified === 1 || $userDetails->is_email_verified === 1){
                    Auth::login($user);
                if (auth()->user()->role == 'user') {
                    return redirect('/user/dashboard')->with('success', 'you are login successfully');
                }
                return redirect()->route('otp.login')->with('error','Phone Number Wrong');
            }else{
                     $userOtp = $this->generateOtp($request->phone_number);
                     $otp=  $userOtp->otp;
                    // $userOtp->sendSMS($request->phone_number);
                    $mailData = [
                        'title' => 'Mail for OTP verify ',
                        'otp' =>  $otp,
                        'verify_type' =>'phone',
                        'user_id'=>$user->id,
                    ];
                    Mail::to($user->email)->send(new otpVerify($mailData));
                    return view('franted.Users.auth.otpVerification',compact('user'))->with('success',  "OTP has been sent on Your phone and email."); 
            }
        }      
    }

    public function generateOtp($phone_number){
       $user = User::where('phone_number', $phone_number)->first();
       $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();
       $now = now();
       if($userOtp && $now->isBefore($userOtp->expire_at)){
           return $userOtp;
       }
        return   UserOtp::create([
            'user_id' => $user->id,
            'otp' => rand(000000, 999999),
            'expire_at' => $now->addMinutes(10)
        ]);
      
    }

   
}
