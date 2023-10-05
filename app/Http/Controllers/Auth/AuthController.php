<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PackageBook;
use App\Models\Product;
use App\Models\ClientDevice;
use App\Models\Affiliate;
use App\Mail\otpVerify;
use App\Mail\BookInfo;
use App\Models\UserOtp;
use App\Models\User;
use Session;
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
        $phone_number ='';
         $referral_code = $request->query('referral_code') ?? '';
        return view('franted.Users.auth.register',compact('phone_number','referral_code'));
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
        $user   =   User::where('phone_number',$request->phone_number)->latest()->first();
        if($user){
            $user=  User::where('id',$user->id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                ]);
        }else{
            $user=  User::create([
                'name' => $data['name'],
                'role' => 'user',
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'password' => Hash::make($data['password']),
                'referral_code'=> $this->generateReferralCode(),
                ]);
        }
       
            $referralData   =   User::where('referral_code',$request->referral_code)->latest()->first();
             if($referralData){
                $clientData =   Affiliate::create(['user_id'=>$user->id,'referral_user_id'=>$referralData->id,]);
             }
            $device_id = md5($_SERVER['HTTP_USER_AGENT']);
            $clientData =   ClientDevice::where('device_id',$device_id)->update(['user_id'=>$user->id]);
            $userOtp = $this->generateOtp($request->phone_number);
            $otp=  $userOtp->otp;
            // $userOtp->sendSMS($request->phone_number);
            $mailData = [
                'title' => 'Mail for OTP verify ',
                'otp' =>  $otp,
                'verify_type' =>'phone',
                'user_id'=>$user->id,
            ];
            Mail::to($request->email)->send(new otpVerify($mailData));
            return view('franted.Users.auth.otpVerification',compact('user'))->with('success',  "OTP has been sent on Your phone and email."); 
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
                $device_id = md5($_SERVER['HTTP_USER_AGENT']);
                $clientData =   ClientDevice::where('device_id',$device_id)->update(['user_id'=>$user->id]);
                if($user->is_phone_verified === 1){
                    Auth::login($user);
                    if (auth()->user()->role == 'user' || auth()->user()->role == 'admin') {
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
                // 'phone_number' => 'required|exists:users,phone_number'
                'phone_number' => 'required|digits:10',
            ]);
              $user   =   User::where('phone_number',$request->phone_number)->latest()->first();
              if($request->product == '' &&  $user == ''){
                $phone_number = $request->phone_number;
                $referral_code ='';
                return view('franted.Users.auth.register',compact('phone_number','referral_code'));
            }
          if(!$user){
            $user = User::Create(
                ['phone_number'   => $request->phone_number,
                'role'   => 'user',
                'referral_code'=> $this->generateReferralCode(),
                'password'=> Hash::make($request->phone_number),
                ]);
            }
             
            $device_id = md5($_SERVER['HTTP_USER_AGENT']);
            $clientData =   ClientDevice::where('device_id',$device_id)->update(['user_id'=>$user->id]);
            if($request->product){
                $product = Product::findOrFail($request->product);
                $deviceData= ClientDevice::where('device_id',$device_id)->latest()->first();
                  $bookData = [
                    'userData' => $user,
                    'product' =>  $product,
                    'deviceData'=>$deviceData,
                ];
                PackageBook::create(['user_id' => $user->id, 'product_id' => $product->id]);
                Mail::to('vka3healthcare@gmail.com')->send(new BookInfo($bookData));
                Auth::login($user);
                return redirect('/services/cart-item')->with('success', 'you are login successfully');
            }
            if($user->is_phone_verified === 1 && $user->role == 'user' || $user->role == 'admin'){
                Auth::login($user);
                return redirect('/user/dashboard')->with('success', 'you are login successfully');
            }else{
                if(!$user->email){
                    $phone_number = $user->phone_number;
                    $referral_code ='';
                    return view('franted.Users.auth.register',compact('phone_number','referral_code'));
                }
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
