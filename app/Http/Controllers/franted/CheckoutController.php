<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\sendMailOrder;
use App\Models\PackageBook;
use App\Models\Shipping;
use App\Models\Billing;
use App\Models\Payment;
use Razorpay\Api\Api;
use App\Models\User;
use App\Models\Order;
use App\Models\State;
use Carbon\Carbon;
use Exception;
use Session;
use Mail;
use Auth;

class CheckoutController extends Controller
{
    public function index(){
        // $cart = session()->get('cart', []);
        $cart = PackageBook::where('user_id', auth()->user()->id)->with('getPackage')->get();
        if(count($cart ?? 0) > 0){
            return view('franted.services.checkout',compact('cart'));
        }
        return redirect()->route()->with('error','Please book any package');
    }
    public function Billing(){
        return view('franted.services.checkout',compact('cart'));
    }
    public function billingAddressCreate(Request $request){
        $validatedData = $request->validate([
            'billing_name'          =>  'required',
            'billing_phone_number'  =>  'required|numeric|digits:10',
            'billing_email'         =>  'required',
            'billing_city'          =>  'required',
            'billing_zip_code'      =>  'required',
            'billing_address'       =>  'required',
            'billing_state'         =>  'required',
            'billing_country'       =>  'required',
        ], [
            'billing_name.required' => 'Please enter your Name',
            'billing_phone_number.required' => 'Please enter phone number ',
            'billing_email.required' => 'Please enter valid email',
            'billing_city.required' => 'Please enter your city',
            'billing_zip_code.required' => 'Please enter zip code',
            'billing_address.required' => 'Please enter address ',
            'billing_state.required' => 'Please select your state valid email',
            'billing_country.required' => 'Please enter country',

        ]);
        $user = User::where('phone_number', $request->billing_phone_number)->first();
        if(auth()->user()){
            if(empty(auth()->user()->email)){
                $user = User::where('id', auth()->user()->id)->update(['email' =>$request->billing_email,'name' =>$request->billing_name]);
            }
        }else{
            return redirect('otp/login')->withErros('you are not login !');
        }
        if(empty($request->is_same_shipping)){
            $validatedData = $request->validate([
                'shipping_name'          =>  'required',
                'shipping_phone_number'  =>  'required|numeric|digits:10',
                'shipping_email'         =>  'required',
                'shipping_city'          =>  'required',
                'shipping_zip_code'      =>  'required',
                'shipping_address'       =>  'required',
                'shipping_state'         =>  'required',
                'shipping_country'       =>  'required',
            ], [
                'shipping_name.required' => 'Please enter your Name',
                'shipping_phone_number.required' => 'Please enter phone number ',
                'shipping_email.required' => 'Please enter valid email',
                'shipping_city.required' => 'Please enter your city',
                'shipping_zip_code.required' => 'Please enter zip code',
                'shipping_address.required' => 'Please enter address ',
                'shipping_state.required' => 'Please select your state valid email',
                'shipping_country.required' => 'Please enter country',
    
            ]);
                $shipping = Shipping::updateOrCreate([
                    'user_id' => auth()->user()->id
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
            'user_id' => auth()->user()->id
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
                'user_id' => auth()->user()->id
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
    public function store(Request $request){
        $cart = PackageBook::where('user_id', auth()->user()->id)->with('getPackage')->get();
        if($request->payment_type == 'cash'){
            $this->cashPayment($cart);
        }else{
            $orderNumber =  $this->generateNumber(10);
            $orderNumber =  "online_order_$orderNumber";
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            if($payment) {
                // try {
                    if($payment->method == 'card'){
                        $cardData=[
                            'card_name'        =>   $payment->card['network'] ?? '',
                            'card_number'      =>   $payment->card['last4'] ?? '',
                            'bank_name'        =>   $payment->card['issuer'] ?? '',
                            'card_id'          =>   $payment->card['id'] ?? '',
                        ];
                    }
                    $paymentData['user_id']         =   auth()->user()->id;
                    $paymentData['transaction_id']  =   $payment->id ?? '';
                    $paymentData['order_id']        =   $payment->order_id ?? '';
                    $paymentData['total_price']     =   $payment->amount/100 ?? '';
                    $paymentData['payment_type']    =   $payment->method ?? '';
                    $paymentData['currency']    =   $payment->currency ?? '';
                    $paymentData['description']    =   $payment->description ?? '';
                    $paymentData['vpa']    =   $payment->vpa ?? '';
                    $paymentData['upi_transaction_id']    =   $payment->acquirer_data['upi_transaction_id'] ?? '';
                    $paymentData['card_details']    =   $cardData ?? '';
                    $paymentData['status']          =   'Success';
                    $paymentData['order_number']    =  $orderNumber ?? '';
                    $paymentDetails= Payment::create($paymentData);

                    // payment order --------------------------------------
                    foreach ($cart as $key => $dataTotal) {
                        foreach ($dataTotal->getPackage as $key => $itam) {
                            $order['user_id']             =   auth()->user()->id ?? '';
                            $order['payment_id']          =   $paymentDetails->id ?? '';
                            $order['product_name']        =   $itam->package_name ?? '';
                            $order['product_description'] =   $itam->package_description ?? '';
                            $order['product_category_name'] =   $itam->package_category_name ?? '';
                            $order['order_number']        =   $paymentDetails->order_number ?? '';
                            $order['quantity']            =   1;
                            $order['product_image']       =   $itam->package_image;
                            $order['product_price']   =   $itam->package_price;
                            $order['product_discount_percentage']  =   $itam->package_discount_percentage ?? 0;
                            $order['delivery_charge'] =   $itam->delivery_charge ?? 0;
                             Order::create($order);
                        }
                    }

                $date = Carbon::now()->format("Y-M-D H:m");
                $billing     =   Billing::where('user_id',auth()->user()->id)->latest()->first();
                $shipping    =   Shipping::where('user_id',auth()->user()->id)->latest()->first();
                    $mailData = [
                        'date' => $date,
                        'order' =>$order,
                        'paymentDetails'=>$paymentDetails,
                        'billing'=>$billing,
                        'shipping'=>$shipping,
                    ];
                    $sendEmail = ['vka3healthcare@gmail.com', auth()->user()->email];
                    Mail::to($sendEmail)->send(new sendMailOrder($mailData));
                
                // } catch (Exception $e) {
                //     return redirect()->back()->withErros($e->getMessage());
                // }
            }
        }
        $cart = PackageBook::where('user_id', auth()->user()->id)->delete();
        // Session::forget('cart', []);
        return redirect()->route('payment.success')->withSuccess('Payment successfully');
    }
    public function cashPayment($cart){
        $orderNumber =  $this->generateNumber(10);
        $orderNumber =  "cash_order_$orderNumber";
        $Subtotal = 0 ;
        foreach ($cart as $key => $itam) {
            foreach ($itam->getPackage as $key => $packageData) {
                $Subtotal += $packageData['package_discount_price'] * 1;
            }
        }
            $paymentData['user_id']         =   auth()->user()->id;
            $paymentData['total_price']     =   $Subtotal ?? 0;
            $paymentData['payment_type']    = 'cash';
            $paymentData['description']    =    'cash payment';
            $paymentData['status']          =   'pending';
            $paymentData['order_number']    =  $orderNumber ?? '';
            $paymentDetails= Payment::create($paymentData);

        foreach ($cart as $key => $dataTotal) {
            foreach ($dataTotal->getPackage as $key => $itam) {
                $order['user_id']             =   auth()->user()->id ?? '';
                $order['payment_id']          =   $paymentDetails->id ?? '';
                $order['product_name']        =   $itam->package_name ?? '';
                $order['product_description'] =   $itam->package_description ?? '';
                $order['product_category_name'] =   $itam->package_category_name ?? '';
                $order['order_number']        =   $paymentDetails->order_number ?? '';
                $order['quantity']            =   1;
                $order['product_image']       =   $itam->package_image;
                $order['product_price']   =   $itam->package_price;
                $order['product_discount_percentage']  =   $itam->package_discount_percentage ?? 0;
                $order['delivery_charge'] =   $itam->delivery_charge ?? 0;
                 Order::create($order);
            }
        }
        $date = Carbon::now()->format("Y-M-D H:m");
        $billing     =   Billing::where('user_id',auth()->user()->id)->latest()->first();
        $shipping    =   Shipping::where('user_id',auth()->user()->id)->latest()->first();
            $mailData = [
                'date' => $date,
                'order' =>$order,
                'paymentDetails'=>$paymentDetails,
                'billing'=>$billing,
                'shipping'=>$shipping,
            ];
            $sendEmail = ['vka3healthcare@gmail.com', auth()->user()->email];
            Mail::to($sendEmail)->send(new sendMailOrder($mailData));
            return true;
    }
    function generateNumber($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    // public function payments(){
    //     $name=$request->name;
    //     $amount=$request->amount;
    //     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    //     $order = $api->oprder->create(array(
    //         'receipt' => 123,
    //         'amount'  => $amount*100,
    //         'currency' => 'INR'
    //     )); 
    //     $orderId=$order['id'];

    //     Session::put('orderId',$orderId);
    //     Session::put('amount',$amount);
    //     return redirect('/');


    // }

    public function successPage(){
        return view('franted.services.success');
    }
}
