<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderMailController extends Controller
{
   

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendOrderMail($id)
    {
        $user_id=Auth::id();
        $billingDetails= BillingDetails::where('id',$id)->first();
        $orderData=PaymetDetail::where('user_id',$user_id)->with('orders','Billing','Shipping')->latest()->first();
        $payOrder=Order::where('user_id',$user_id)->latest()->first();
       
        $first_name   =   $orderData->billing['first_name'];
        $second_name  =   $orderData->billing['second_name'];
        $address      =   $orderData->billing['address'];
        $city         =   $orderData->billing['city'];
        $pin_code     =   $orderData->billing['pin_code'];
        $state        =   $orderData->billing['state'];
        $country      =   $orderData->billing['country'];
        $phone_number =    $orderData->billing['phone_number'];
        $email        =   $orderData->billing['email'];

        $shipping_first_name   =   $orderData->shipping['shipping_first_name'];
        $shipping_second_name  =   $orderData->shipping['shipping_second_name'];
        $shipping_address      =   $orderData->shipping['shipping_address'];
        $shipping_city         =   $orderData->shipping['shipping_city'];
        $shipping_pin_code     =   $orderData->billing['shipping_pin_code'];
        $shipping_state        =   $orderData->billing['shipping_state'];
        $shipping_country      =   $orderData->shipping['shipping_country'];
        $shipping_phone_number =    $orderData->shipping['shipping_phone_number'];
        $shipping_email        =   $orderData->shipping['shipping_email'];
        
        $payment_type           =   $orderData->payment_type;
        $payment_total_amount   =   $orderData->payment_total_amount;
        $product_total_price    =   $orderData->product_total_price;
        $product_discount    =   $orderData->coupon_discount != '' ?$orderData->coupon_discount : 0;
        $product_delivery_charge=   $orderData->product_delivery_charge != '' ? $orderData->product_delivery_charge : 0;
        $shipping_service_type=   $orderData->shipping_service_type;
       

    
        $date=$orderData->created_at;
        $orderDate=$date->toDayDateTimeString();
  
            $from = 'europeanwindows@gmail.com'; 
             $to = $billingDetails->email;
            $fromName = 'European windows'; 
            $subject = "Your ordered successfully"; 
            $htmlContent = "\n";
                    $htmlContent .= ' 
                    <!doctype html>
                    <html lang="en">
                    <head>
                        <!-- Required meta tags -->
                        <meta charset="utf-8">
                        <style type="text/css">
                            td {
                                padding: 5px 10px;
                            }
                        </style>
                
                    </head>
                    <body style="font-family: sans-serif">
                        <div class="email-table" style=" width: 100%;max-width: 800px;margin: auto;padding: 100px 0px;">
                            <table class="main-table" style="width:100%;max-width:800px;margin:auto;">
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <h2 style="font-size: 22px;">European Windows US</h2>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    europeanwindows.com/products
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>European Windows US</td>	
                                            </tr>
                                            <tr>
                                                <td>41 First Ave</td>	
                                            </tr>
                                            <tr>
                                                <td>Monroe, New York 10930</td>	
                                            </tr>
                                            <tr>
                                                <td>United States</td>	
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table style="width:100%;">
                                            <tr>
                                                <td>
                                                    <h2 style ="font-size: 18px;font-weight: bold;">Contact</h2>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>+1 929-515-3744</td>	
                                            </tr>
                                            <tr>
                                                <td>sales@europeanwindowsus.com</td>	
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr></tr>
                            </table>
                            <hr style=" border-top: 2px solid #000;">
                            <table class="main-table" style="width:100%;max-width:800px;margin:auto;">
                                <tr>
                                    <td><h2> '.$orderDate.'</h2></td>
                                </tr>
                                <tr>
                                    <td>Delivery to</td>
                                    <td>Buyer</td>
                                    <td>Delivery via Local delivery<br>
                                        – Highland Mills,
                                    </td>
                                </tr>
                                <tr>
                                    <td>'. $first_name.'  '.$second_name.'</td>
                                    <td>'. $shipping_first_name.' '.$shipping_second_name.'</td>
                                    <td>Payment method Pay by<br></td>
                                </tr>
                                <tr>
                                    <td>'.$address.'</td>
                                    <td>'.$shipping_address.'</td>
                                    <td>'.$payment_type.'</td>
                                </tr>
                                
                                <tr>
                                    <td>'. $city.'  '.$pin_code.' '.$state.' </td>
                                    <td>'. $shipping_city.'  '.$shipping_pin_code.'  '.$shipping_state.' </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>'.$country.'</td>
                                    <td>'.$shipping_country.'</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>'.$phone_number.'</td>
                                    <td>'.$shipping_phone_number.'</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>'.$email.'</td>
                                    <td>'.$shipping_email.'</td>
                                    <td></td>
                                </tr>
                            </table>
                            <hr style=" border-top: 2px solid #000;">';
                            $htmlContent .='	
                            <table class="main-table" style="width:100%;max-width:800px;margin:auto;margin-bottom: 30px;">
                                <tr>
                                    <td><h2>Order #FFXNR</h2></td>
                                    <td></td>
                                    <td></td>
                                </tr>';
                                 ?>
                                <?php  foreach($orderData->orders as $key => $ordervalue) { 
                                  $imgPath= url('/products_images/'.$ordervalue['product_image']);
                                    
                                    ?>
                                <?php
                                   $htmlContent .=' <tr>
                                    <td><img src="'. $imgPath.'" alt="image" style="height:70px;width:100px"></td>
                                    <td>
                                        <b> '.$ordervalue['product_name'] .'</b><br>'; ?>
                                        <?php  if($ordervalue->product_color){   ?>
                                        <?php $htmlContent .='  Color : <span>'.$ordervalue['product_color'].'</span><br> '; ?>
                                        <?php   } ?>
                                    
                                        <?php  if($ordervalue->window_type){   ?>
                                        <?php $htmlContent .=' Window Type : <span>'.$ordervalue['window_type'].'</span><br> '; ?>
                                        <?php   } ?>

                                        <?php  if($ordervalue->product_size){   ?>
                                        <?php $htmlContent .=' Size: <span>'.$ordervalue['product_size'].'</span> '; ?>
                                        <?php   } ?>
                                    
                                     <?php
                                    $htmlContent .='
                                    </td>
                                    <td>'.$ordervalue['product_quantity'].'</td>
                                    <td>X</td>
                                    <td>$'.$ordervalue['product_price'].'</td>
                                    <td>=</td>
                                    <td>$'.$ordervalue['product_quantity'] * $ordervalue['product_price'].'</td>
                                </tr>';
                                    ?>
                                   <?php } ?>
                                    <?php   
                                    $htmlContent .='<tr>
                                    <td></td>
                                </tr>
                            </table>
                            <hr style=" border-top: 2px solid #000;">	
                            <table class="main-table" style="width:100%; max-width:350px;margin-left: auto;">
                                <tr>
                                    <td>
                                        <table style="width:100%;">
                                            <tr><td style="text-align:right;">Total Price</td>
                                                <td style="text-align:right;">$'.$product_total_price.'</td>
                                            </tr>
                                            <tr><td style="text-align:right;">Delivery Charge</td>
                                                <td style="text-align:right;"><b>+</b> $'.$product_delivery_charge.' ('.$shipping_service_type.')</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right;">Discount</td>
                                                <td style="text-align:right;"><b>-</b> $'.$product_discount.'</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><hr /></td>
                                            </tr>
                                            <tr><td style="text-align:right;"><b>Pay Amount</b></td>
                                                <td style="text-align:right;"><b>$'.$payment_total_amount.'</b></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <div style="text-align: center; margin-top: 80px;">
                                <img src="https://147.182.164.70/front/images/image.png" alt="image">
                            </div>
                        </div>                   
                    </body>
                    </html>
                
                '; 
            // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
            
            // Additional headers 
            $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
          $mail=  mail($to, $subject, $htmlContent, $headers);
          if($mail){
            return redirect('/thank-you')->with('success','Payment Successfully');
          }else{
            return redirect()->back()->with('error','Payment Failed');
          }
            
    
    
    }
}
