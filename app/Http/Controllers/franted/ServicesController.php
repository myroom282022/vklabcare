<?php

namespace App\Http\Controllers\franted;

use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distinct;
use App\Models\Product;
use App\Models\Package;
use App\Models\State;


class ServicesController extends Controller
{
    public function index(Request $request){
      
        $product=  Package::with('getProduct')->get();
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
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showCart()
    {
         $cart = session()->get('cart', []);
        return view('franted.services.cart',compact('cart'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
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
        return redirect('services/cart-item')->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($id)
    {
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
        $state=State::all();
        $distinct=Distinct::all();
        $ip = $request->ip();
        if($ip =='127.0.0.1'){
            $ip = '110.224.79.223'; 
        }else{
            $ip = $request->ip();
        }
        $currentUserInfo = Location::get($ip);
        $cart = session()->get('cart', []);
        return view('franted.services.billingAddress',compact('cart','state','distinct','currentUserInfo'));

    }
}
