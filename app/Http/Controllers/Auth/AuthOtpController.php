<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserOtp;
use App\Models\UserDetails;

class AuthOtpController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function login()
    {
        return view('franted.Users.auth.otpLogin');

    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generate(Request $request)
    {
        // /* Validate Data */
        // $request->validate([
        //     'phone_number' => 'required|exists:users,phone_number'
        // ]);
  
        /* Generate An OTP */
        $user=User::where('id',$request->user_id)->first();
        if(!empty($user)){
            $phoneNumber=$user->phone_number;
          return    $userOtp = $this->generateOtp($phoneNumber);
            $userOtp->sendSMS($phoneNumber);
            return view('franted.Users.auth.otpVerification',compact('user'))->with('success',  "OTP has been sent on Your Mobile Number."); 
        }else{
            return redirect('otp/login')->with('error',  "Please try again !."); 
        }
        
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generateOtp($phoneNumber)
    {
        $user = User::where('phone_number', $phoneNumber)->first();
  
        /* User Does not Have Any Existing OTP */
        $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();
  
        $now = now();
  
        if($userOtp && $now->isBefore($userOtp->expire_at)){
            return $userOtp;
        }
  
        /* Create a New OTP */
        $otpUpdat['otp']        =   rand(000000, 999999);
        $otpUpdat['expire_at']  =   $now->addMinutes(10);
        return UserOtp::where('id',$userOtp->id)->update($otpUpdat);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function verification($user_id)
    // {
    //     return view('franted.Users.auth.otpVerification')->with([
    //         'user_id' => $user_id
    //     ]);
    // }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
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
