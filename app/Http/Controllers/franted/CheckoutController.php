<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Shipping;
use Razorpay\Api\Api;
use Session;
use Exception;

class CheckoutController extends Controller
{
    public function index(){
        $cart = session()->get('cart', []);
        return view('franted.services.checkout',compact('cart'));

    }
    public function Billing(){
        
        return view('franted.services.checkout',compact('cart'));

    }
    public function billingAddressCreate(Request $request){
        $validatedData = $request->validate([
            'billing_name'          =>  'required',
            'billing_phone_number'  =>  'required|numeric|digits:10',
            'billing_email'         =>  'required|email|unique:billings',
            'billing_city'          =>  'required',
            'billing_zip_code'      =>  'required',
            'billing_address'       =>  'required',
            'billing_state'         =>  'required',
            'billing_country'       =>  'required',
        ], [
            'billing_name.required' => 'Please enter your Name',
            'billing_phone_number.required' => 'Please enter phone number ',
            'billing_email.required' => 'Please enter valid email',
            'unique.email' => 'Email is already exit.',
            'billing_city.required' => 'Please enter your city',
            'billing_zip_code.required' => 'Please enter zip code',
            'billing_address.required' => 'Please enter address ',
            'billing_state.required' => 'Please select your state valid email',
            'billing_country.required' => 'Please enter country',

        ]);

        if(empty($request->is_same_shipping)){
            $validatedData = $request->validate([
                'shipping_name'          =>  'required',
                'shipping_phone_number'  =>  'required|numeric|digits:10',
                'shipping_email'         =>  'required|email|unique:shippings',
                'shipping_city'          =>  'required',
                'shipping_zip_code'      =>  'required',
                'shipping_address'       =>  'required',
                'shipping_state'         =>  'required',
                'shipping_country'       =>  'required',
            ], [
                'shipping_name.required' => 'Please enter your Name',
                'shipping_phone_number.required' => 'Please enter phone number ',
                'shipping_email.required' => 'Please enter valid email',
                'unique.email' => 'Email is already exit.',
                'shipping_city.required' => 'Please enter your city',
                'shipping_zip_code.required' => 'Please enter zip code',
                'shipping_address.required' => 'Please enter address ',
                'shipping_state.required' => 'Please select your state valid email',
                'shipping_country.required' => 'Please enter country',
    
            ]);
                $shipping = Shipping::updateOrCreate([
                    'id' => '$request->id'
                ], [
                    'shipping_name'          =>  $request->shipping_name,
                    'shipping_phone_number'  =>  $request->shipping_phone_number,
                    'shipping_email'         =>  $request->shipping_email,
                    'shipping_city'          =>  $request->shipping_city,
                    'shipping_zip_code'      =>  $request->shipping_zip_code,
                    'shipping_address'       =>  $request->shipping_address,
                    'shipping_state'         =>  $request->shipping_state,
                    'shipping_country'       =>  $request->shipping_country,
                ]);
        }
        
        $billing = Billing::updateOrCreate([
            'id' => '$request->id'
        ], [
            'billing_name'          =>  $request->billing_name,
            'billing_phone_number'  =>  $request->billing_phone_number,
            'billing_email'         =>  $request->billing_email,
            'billing_city'          =>  $request->billing_city,
            'billing_zip_code'      =>  $request->billing_zip_code,
            'billing_address'       =>  $request->billing_address,
            'billing_state'         =>  $request->billing_state,
            'billing_country'       =>  $request->billing_country,
        ]);
        if($request->is_same_shipping){
            $shipping = Shipping::updateOrCreate([
                'id' => '$request->id'
            ], [
                'shipping_name'          =>  $request->billing_name,
                'shipping_phone_number'  =>  $request->billing_phone_number,
                'shipping_email'         =>  $request->billing_email,
                'shipping_city'          =>  $request->billing_city,
                'shipping_zip_code'      =>  $request->billing_zip_code,
                'shipping_address'       =>  $request->billing_address,
                'shipping_state'         =>  $request->billing_state,
                'shipping_country'       =>  $request->billing_country,
            ]);
        }    
        return redirect('payment/index')->withSuccess("Billing address add successfully");
    }
    //payment getway 
    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
