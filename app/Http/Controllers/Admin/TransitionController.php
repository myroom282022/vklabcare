<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class TransitionController extends Controller
{
    // show all data -------------------
    public function index()
    {
        $transition= Payment::latest()->paginate(10);
        return view('admins.transition.index',compact('transition'));
    } 

     // show all data -------------------
     public function order($id)
     {
         $order= Order::where('payment_id',$id)->latest()->paginate(10);
         return view('admins.transition.order',compact('order'));
     } 
}
