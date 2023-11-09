<?php

namespace App\Http\Controllers\franted;

use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\Controller;
use App\Models\PackageCategory;
use App\Models\ClientDevice;
use Illuminate\Http\Request;
use App\Models\PackageBook;
use App\Jobs\SendEmailJob;
use App\Models\Product;
use App\Models\Package;
use App\Mail\BookInfo;
use App\Models\User;
use Session;
use Mail;

class UserPackageController extends Controller
{
    public function index(Request $request){
        $package=  PackageCategory::with('getPackageCategory')->get();
        return view('franted.packages.index',compact('package'));
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
          'package' =>  $package,
          'deviceData'=>$deviceData,
      ];
        PackageBook::create(['user_id'=>$user->id,'package_id'=>$package->id]);
        // dispatch(new SendEmailJob($bookData));
        $users = User::where('role', 'caller')->orWhere('role', 'admin')->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new BookInfo($bookData));
        } 
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

    public function singlePackage($slug){
        $package = Package::where('package_slug_name',$slug)->latest()->first();
        if(empty($package)){
            $package = Package::where('id',$slug)->latest()->first();
        }
         $packageData=  Package::where('package_category_name',$package->package_category_name ?? '')->get();
        return view('franted.packages.single-packages',compact('package','packageData'));
    }
}
