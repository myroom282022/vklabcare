<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PackageBook;
use App\Models\Package;

class BookOrderController extends Controller
{
    // show all data -------------------
    public function index(){
        $orderData = PackageBook::with('getBookOrders','getDeviceDatils')->latest()->paginate(10);
        return view('admins.bookOrdrs.index',compact('orderData'));
    } 

     // show all data -------------------
    public function bookinOrder($id){
        $order= Package::where('id',$id)->latest()->paginate(10);
        return view('admins.bookOrdrs.order',compact('order'));
    } 
}
