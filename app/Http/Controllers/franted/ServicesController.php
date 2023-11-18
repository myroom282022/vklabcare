<?php

namespace App\Http\Controllers\franted;

use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distinct;
use App\Models\Product;
use App\Models\Package;
use App\Models\State;
use App\Models\Billing;
use App\Models\Shipping;
use App\Models\ClientDevice;
use App\Models\User;
use App\Mail\BookInfo;
use App\Models\PackageBook;
use Mail;
use Session;

class ServicesController extends Controller
{
    public function index(Request $request){
        $product =  Package::with('getProduct')->get();
        return view('franted.services.index',compact('product'));
    }
    public function product($id){
        if($id){
         $product= Product::where('package_name',$id)->latest()->paginate(10);
         return view('franted.services.product',compact('product'));
        }
         $product= Product::latest()->paginate(10);
         if($product){
             return view('franted.services.product',compact('product'));
         }
         $product='';
         return view('franted.services.product',compact('product'));
 
     }
   
    public function showCart(){
         $cart = session()->get('cart', []);
        return view('franted.services.cart',compact('cart'));
    }
    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "quantity" => 1,
                "product_description" =>  $product->product_description,
                "product_price" => $product->product_price,
                "product_image" => $product->product_image
            ];
        }
       
        session()->put('cart', $cart);
        session()->put('product_id', $product->id);
        if(empty(auth()->user())){
            $referral_code='';  
            $product=$product->id;
            return view('franted.Users.auth.otpLogin',compact('product','referral_code'));
        }
        $user=auth()->user();
        $deviceData= ClientDevice::where('user_id',$user->id)->latest()->first();
        $bookData = [
          'userData' => $user,
          'product' =>  $product,
          'deviceData'=>$deviceData,
      ];
        PackageBook::create(['user_id'=>$user->id,'product_id'=>$product->id]);
        Mail::to('vka3healthcare@gmail.com')->send(new BookInfo($bookData));
        return redirect('services/cart-item')->with('success', 'Package Book in cart successfully!');
    }
  
    public function update(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove($id){
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed to cart successfully!');

        }
    }

    public function billingAddress(Request $request){
        $product= Session::get('product_id');
        $billing='';
        $shipping='';
        $userData='';
        if(empty(auth()->user())){
            $referral_code='';  
            return view('franted.Users.auth.otpLogin',compact('product','referral_code'));
        }
        $userData=auth()->user();
        $billing=Billing::where('user_id',$userData->id)->latest()->first();
        $shipping=Shipping::where('user_id',$userData->id)->latest()->first();
        $ip = $request->ip();
        if($ip == '127.0.0.1' || $ip == '::1'){
            $ip = '110.224.79.223'; 
        }else{
            $ip = $request->ip();
        }
        $currentUserInfo = Location::get($ip);
        // $cart = session()->get('cart', []);
        $cart = PackageBook::where('user_id', $userData->id)->with('getPackage')->get();
        return view('franted.services.billingAddress',compact('cart','currentUserInfo','userData','shipping','billing'));

    }
}
