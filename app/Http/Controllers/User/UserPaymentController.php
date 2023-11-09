<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class UserPaymentController extends Controller
{
    public function index(){
        $payData = Payment::with('singleUserPayment')->where('user_id',auth()->user()->id)->latest()->paginate(5);
        if(empty($payData)){
            $payData =[];
        }
        return view('franted.Users.payment.index',compact('payData'));
    }
    public function usersOrders(){
        $payData = Order::with('singleUserOrderPayment')->where('user_id',auth()->user()->id)->latest()->paginate(5);
        if(empty($payData)){
            $payData =[];
        }
        return view('franted.Users.payment.orders',compact('payData'));
    }
}
