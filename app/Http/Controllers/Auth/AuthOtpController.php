<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserOtp;
use App\Models\UserDetails;
use App\Mail\otpVerify;
use Mail;

class AuthOtpController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function login(){
        return view('franted.Users.auth.otpLogin');
    }
  
    public function generate(Request $request)
    {
        $user=User::where('id',$request->user_id)->first();
        if(!empty($user)){
            $phoneNumber=$user->phone_number;
            $userOtp = $this->generateOtp($phoneNumber);
            // $userOtp->sendSMS($phoneNumber);
             $mailData = [
                'title' => 'Mail for OTP verify ',
                'otp' =>  $userOtp->otp,
                'verify_type' =>'email',
                'user_id'=>$user->id,
            ];
            Mail::to($user->email)->send(new otpVerify($mailData));
            return view('franted.Users.auth.otpVerification',compact('user'))->with('success',  "OTP has been sent on Your phone and email id."); 
        }else{
            return redirect('otp/login')->with('error',  "Please try again !."); 
        }
        
    }
  
    public function generateOtp($phoneNumber)
    {
        $user = User::where('phone_number', $phoneNumber)->first();
        $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();
        if($userOtp){
            $now = now();
            $otpUpdate['otp']        =   rand(000000, 999999);
            $otpUpdate['expire_at']  =   $now->addMinutes(10);
            UserOtp::where('id',$userOtp->id)->update($otpUpdate);
            return $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();

        }else{
            return   UserOtp::create([
                'user_id' => $user->id,
                'otp' => rand(000000, 999999),
                'expire_at' => $now->addMinutes(10)
            ]);
        }
       
    }
  
    public function linkVerify($user_id,$otp){
            /* Validation Logic */
            $userOtp   = UserOtp::where('user_id', $user_id)->where('otp', $otp)->first();
            $now = now();
            $user=User::where('id',$user_id)->first();
            if (!$userOtp) {
                return view('franted.Users.auth.otpVerification',compact('user'))->with('error', 'Your OTP is not correct'); 
            }else if($userOtp && $now->isAfter($userOtp->expire_at)){
                return view('franted.Users.auth.otpVerification',compact('user'))->with('error', 'Your OTP has been expired'); 
            }
            $user = User::whereId($user_id)->first();
            if($user){
                $userOtp->update([
                    'expire_at' => now(),
                    'verify_type' => 'email',
                ]);
                UserDetails::where('user_id',$user_id)->update(['is_email_verified' => 1]);
                Auth::login($user);
                return redirect('/user/dashboard')->with('success', 'your are login successfully');
            }
            return view('franted.Users.auth.otpVerification',compact('user'))->with('error', 'Your link is expired !'); 

    }

    public function loginWithOtp(Request $request)
    {
        /* Validation */
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);  
  
        /* Validation Logic */
        $userOtp   = UserOtp::where('user_id', $request->user_id)->where('otp', $request->otp)->first();
        $now = now();
        $user=User::where('id',$request->user_id)->first();
        if (!$userOtp) {
            return view('franted.Users.auth.otpVerification',compact('user'))->with('error', 'Your OTP is not correct'); 
        }else if($userOtp && $now->isAfter($userOtp->expire_at)){
            return view('franted.Users.auth.otpVerification',compact('user'))->with('error', 'Your OTP has been expired'); 
        }
        $user = User::whereId($request->user_id)->first();
        if($user){
            $userOtp->update([
                'expire_at' => now(),
                'verify_type' => 'phone Number',
            ]);
            UserDetails::where('user_id',$request->user_id)->update(['is_phone_verified' => 1]);
            Auth::login($user);
            return redirect('/user/dashboard')->with('success', 'your are login successfully');
        }
        return view('franted.Users.auth.otpVerification',compact('user'))->with('error', 'Your Otp is not correct'); 

    }
}
