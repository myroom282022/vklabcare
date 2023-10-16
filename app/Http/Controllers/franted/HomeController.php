<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Package;
use App\Models\ClientDevice;


class HomeController extends Controller
{
    public function index(Request $request){
      $slider = Slider::latest()->paginate(3);
      $package = Package::latest()->get();
      $device_id = md5($_SERVER['HTTP_USER_AGENT']);
      $data = ClientDevice::where('device_id',$device_id)->first();
      if(isset($data)){
        $ip = $request->ip();
        if($ip =='127.0.0.1'){
            $ip = '103.48.198.141'; 
        }else{
            $ip = $request->ip();
            $locationInfo = Location::get($ip);
            $this->deviceDetails($locationInfo);
        }
      }
      return view('franted.home.index',compact('slider','package'));
    }

    public function deviceDetails($locationInfo){
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
            $device_type= "Mobile";
        }
        else{
          $device_type= "Desktop/Laptop";
        }
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $temp = strtolower($_SERVER['HTTP_USER_AGENT']);
        $bname    = 'Unknown';
        $platform = 'Unknown';  
        $ub = 'Unknown';
        $version  = "";
        // Get the platform
        if (preg_match('/linux/i', $temp)) {
          $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $temp)) {
          $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $temp)) {
          $platform = 'windows';
        }
      
        // Get the name of the useragent
        if(preg_match('/msie/i',$temp) && !preg_match('/opera/i',$temp)) {
          $bname = 'Internet Explorer';
          $ub = "msie";
        }
        elseif(preg_match('/firefox/i',$temp)) {
          $bname = 'Mozilla Firefox';
          $ub = "firefox";
        }
        elseif(preg_match('/chrome/i',$temp)) {
          $bname = 'Google Chrome';
          $ub = "chrome";
        }
        elseif(preg_match('/safari/i',$temp)) {
          $bname = 'Apple Safari';
          $ub = "safari";
        }
        elseif(preg_match('/opera/i',$temp)) {
          $bname = 'Opera';
          $ub = "opera";
        }
        elseif(preg_match('/netscape/i',$temp)) {
          $bname = 'Netscape';
          $ub = "netscape";
        }
      
        $known = array('version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        preg_match_all($pattern, $temp, $matches);
        // dd($matches['version']);
        $i = count($matches['browser']);
        if ($i != 1) {
          if (strripos($temp,"version") < strripos($temp,$ub)) {
            $version = $matches['version'][0];
          }
        }
        else {
          $version = $matches['version'][0];
        }
        if ($version == null || $version == "") {
          $version = "?";
        }
        
        $device_id = md5($_SERVER['HTTP_USER_AGENT']);
        $ipaddress = getenv("REMOTE_ADDR") ;
      if($ipaddress){
          $ipaddress = getenv("REMOTE_ADDR") ;
      }else{
          $ipaddress = $_SERVER['REMOTE_ADDR'];
      }
         $post = ClientDevice::updateOrCreate([
            'device_id' => $device_id,
        ], [
            
            'device_name' => '',
            'device_platform' => $platform,
            'device_type' =>  $device_type,
            'device_ipaddress' => $ipaddress,
            'browser_name' => $bname,
            'browser_version' => $version,
            'ip_address' => $locationInfo->ip ?? '',
            'countryName' =>  $locationInfo->countryName ?? '',
            'regionName'  =>  $locationInfo->regionName ?? '',
            'cityName'  =>  $locationInfo->cityName ?? '',
            'zipCode' =>  $locationInfo->zipCode ?? '',
            'latitude'  =>  $locationInfo->latitude ?? '',
            'longitude' =>  $locationInfo->longitude ?? '',
            'regionCode'  =>  $locationInfo->regionCode ?? '',
            'countryCode' =>  $locationInfo->countryCode ?? '',
            'regionName'  =>  $locationInfo->regionName ?? '',
            'isoCode' =>  $locationInfo->isoCode ?? '',
            'postalCode'  =>  $locationInfo->postalCode ?? '',
            'metroCode' => $locationInfo->metroCode ?? '',
            'areaCode'  => $locationInfo->areaCode ?? '',
            'timezone'  => $locationInfo->timezone ?? '',
        ]);
       return true;
    }
  

 

    // export csv file 
    public function exportExcel()
    {
      $date = Carbon::now()->subDays(1);
        // $date = Carbon::now()->today();
        $data=Order::where('created_at', '>=', $date)->with('orderDetailsPayments','billingDate','shippingDate')->get();
        if($data){ 
          $delimiter = ","; 
          $filename = "Order" . date('Y-m-d-H-i-s') . ".csv"; 
           
          // Create a file pointer 
          $f = fopen('php://memory', 'w'); 
           
          // Set column headers 
          $ordersfiled= array('ID','Order Date', 'Order Number', ' Name', ' Quantity', ' Price', ' Color', ' Size', 'Window Type'); 

          $paymentfields = array( 'Paid Date','Transaction Id', ' Coupon Discount', 'Delivery Charge', ' Total Payments', ' Payments Type', ' Payment Status'); 
          $billingfiled= array( ' First Name (Billing)','Last Name (Billing)','Phone Number (Billing)','Email (Billing)','Address (Billing)','city (Billing)','state (Billing)','country (Billing)','Pin Code (Billing)'); 
          $shippingfiled= array( ' First Name  (Shipping)','Last Name  (Shipping)','Phone Number  (Shipping)','Email  (Shipping)','Address  (Shipping)','city  (Shipping)','state  (Shipping)','country  (Shipping)','Pin Code  (Shipping)');
          $ordersFielsData=   array_merge($ordersfiled ,$paymentfields);
          $addressFiled=   array_merge($billingfiled,$shippingfiled);
          $fields=   array_merge($ordersFielsData,$addressFiled);

          fputcsv($f, $fields, $delimiter); 
          $lineData=[];
      
          $id=1;
          foreach($data as  $row){
            $orderData = array($id, $row->created_at->format('d/m/Y  H:i') ,$row['order_number'], $row['product_name'], $row['product_quantity'], $row['product_price'], $row['product_color'], $row['product_size'], $row['window_type']); 
           
            foreach($row->orderDetailsPayments as $value){
                $paymentsData = array( $value->created_at->format('d/m/Y  H:i') ,$value['transaction_id'], $value['coupon_discount'], $value['product_delivery_charge'], $value['payment_total_amount'], $value['payment_type'], $value['payment_status']); 
            }

            foreach($row->billingDate as $billing){
                $billingDetails = array( $billing['first_name'], $billing['second_name'], $billing['phone_number'], $billing['email'], $billing['address'], $billing['city'], $billing['state'], $billing['country'], $billing['pin_code']); 
            }

            foreach($row->shippingDate as $shipping){
                $shippingDetails =  array( $shipping['shipping_first_name'], $shipping['shipping_second_name'], $shipping['shipping_phone_number'], $shipping['shipping_email'], $shipping['shipping_address'], $shipping['shipping_city'], $shipping['shipping_state'], $shipping['shipping_country'], $shipping['shipping_pin_code']);
            }
            $id++;
            $addressData=array_merge($billingDetails,$shippingDetails);
            $ordersDetailsData=array_merge($orderData,$paymentsData);
            $lineData=array_merge($ordersDetailsData,$addressData);
            fputcsv($f, $lineData, $delimiter); 
          } 
          fseek($f, 0); 
          header('Content-Type: text/csv'); 
          header('Content-Disposition: attachment; filename="' . $filename . '";'); 
          fpassthru($f); 
        } 
      exit; 
    }
}
