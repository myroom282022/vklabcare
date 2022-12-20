<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        $cart = session()->get('cart', []);
        return view('franted.services.checkout',compact('cart'));

    }
    public function Billing(){
        
        return view('franted.services.checkout',compact('cart'));

    }
}
