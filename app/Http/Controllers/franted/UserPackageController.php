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

class UserPackageController extends Controller
{
    public function index(Request $request){
        $product=  Package::with('getProduct')->get();
        return view('franted.packages.index',compact('product'));
    }
    public function packageBook($slug){
        $package = Package::where('package_slug_name',$slug)->latest()->first();
        
        if(empty(auth()->user())){
            $referral_code='';  
            $package=$package->id;
            return view('franted.Users.auth.otpLogin',compact('package','referral_code'));
        }
        $user=auth()->user();
        $deviceData= ClientDevice::where('user_id',$user->id)->latest()->first();
        $bookData = [
          'userData' => $user,
          'product' =>  $package,
          'deviceData'=>$deviceData,
      ];
        PackageBook::create(['user_id'=>$user->id,'package_id'=>$package->id]);
        Mail::to('vka3healthcare@gmail.com')->send(new BookInfo($bookData));
        return redirect()->route('packages.list')->with('success', 'Package Book in cart successfully!');
    }
    
    public function getBookList(){
        $user = auth()->user();
        if($user){
            $cart = PackageBook::where('user_id', $user->id)->with('getPackage')->get();
            return view('franted.packages.cart',compact('cart'));
        }else{
            return redirect('otp/login')->with('errors','You are not login');
        }
   }
   public function remove($id){
         $cart = PackageBook::where('package_id',$id)->latest()->first();
         $cart->delete();
      return redirect()->back()->with('success', 'Packages removed to cart successfully!');
    }
}
