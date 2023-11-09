<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
<title>Vka3 healthcare</title>
</head>
<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <table class="my-5" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            <td align="center" bgcolor="#0bb2f0" style="padding: 20px;">
                <h2 class="text-info" style="color:white">VKA3 Healthcare </h2>
            </td>
        </tr>
        <td bgcolor="#ffffff" style="padding: 20px;">
          <p>Hello Dear,</p>
          <p>I hope this message finds you well. We are pleased to confirm your order for a health package.</p>
          <p>Here are the details of your booking:</p>
          <p><strong>Name:</strong> <span style="color:#0bb2f0">{{ auth()->user()->name ?? '' }}</span></p>
          <p><strong>Email:</strong> <span style="color:#0bb2f0">{{ auth()->user()->email ?? '' }}</span></p>
          <p><strong>Phone No:</strong> <span style="color:#0bb2f0">{{ auth()->user()->phone_number ?? '' }}</span></p>
          <p>Thank you for choosing our services. If you have any questions or need further assistance, please feel free to contact us.</p>
      </td>
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px;">
                <h1 style="color:#0bb2f0">Product Details</h1>
                @foreach ($mailData['order'] as $key => $dataTotal) 
                    <p><strong>Package Category:</strong> {{ $dataTotal['product_category_name'] ?? ''}}</p>
                    <p><strong>Name:</strong> {{ $dataTotal['product_name'] ?? ''}}</p>
                    <p><strong>Description:</strong>{{ str_replace('\n', ',', trim($dataTotal['product_description'] ?? '')) }}</p>
                    <p><strong>Price: ₹</strong>{{  $dataTotal['product_price'] ?? 0 }}</p>
                    <p><strong>Discount Percentage: </strong>{{  $dataTotal['package_discount_percentage'] ?? 0 }}%</p>
                    <p><strong>Total Price: ₹</strong>{{  $dataTotal['product_price'] ?? 0 }}</p>
                    {{-- <img src="{{$dataTotal['image'] ?? ''}}" class="img-fluid rounded-3"> --}}
                    <img src="{{asset('storage/package/img/'.$dataTotal['product_image'])}}" class="img-fluid rounded-3">
                @endforeach
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px;">
                <h1 style="color:#0bb2f0">Payment Details</h1>
                <p><strong>Order Number:</strong> {{ $mailData['paymentDetails']['order_number']  ?? ''}}</p>
                <p><strong>Payment description:</strong> {{ $mailData['paymentDetails']['description']  ?? ''}}</p>
                <p><strong>Payment Status:</strong> {{ $mailData['paymentDetails']['status']  ?? ''}}</p>
                <p><strong>Payment type:</strong> {{ $mailData['paymentDetails']['payment_type']  ?? ''}}</p>
                <p><strong>Price: ₹</strong>{{ $mailData['paymentDetails']['total_price']  ?? 0 }}</p>
                <p><strong>Discount : </strong>{{  $mailData['paymentDetails']['discount'] ?? 0 }}%</p>
                <p><strong>Total Price: ₹</strong>{{  $mailData['paymentDetails']['total_price'] ?? 0 }}</p>
            </td>
        </tr>

        <tr>
            <td bgcolor="#ffffff" style="padding: 20px;">
                <h1 style="color:#0bb2f0">Billing Details</h1>
                <p><strong>Name:</strong> <span style="color:#0bb2f0">{{ $mailData['billing']['billing_name'] ?? ''}}</span></p>
                <p><strong>Email:</strong> <span style="color:#0bb2f0">{{ $mailData['billing']['billing_email'] ?? ''}}</span></p>
                <p><strong>Phone No:</strong> <span style="color:#0bb2f0">{{ $mailData['billing']['billing_phone_number'] ?? ''}}</span></p>
                <p><strong>City Name:</strong> {{ $mailData['billing']['billing_city'] ?? ''}}</p>
                <p><strong>Country name:</strong>{{  $mailData['billing']['billing_address'] ?? '' }}</p>
                <p><strong>Country name:</strong>{{  $mailData['billing']['billing_state'] ?? '' }}</p>
                <p><strong>Zip <code></code>:</strong> {{  $mailData['billing']['billing_zip_code'] ?? ''}}</p>
                <p><strong>Zip <code></code>:</strong> {{  $mailData['billing']['billing_country'] ?? ''}}</p>
            </td>

            <td bgcolor="#ffffff" style="padding: 20px;">
                <h1 style="color:#0bb2f0">shipping Details</h1>
                <p><strong>Name:</strong> <span style="color:#0bb2f0">{{ $mailData['shipping']['shipping_name'] ?? ''}}</span></p>
                <p><strong>Email:</strong> <span style="color:#0bb2f0">{{ $mailData['shipping']['shipping_email'] ?? ''}}</span></p>
                <p><strong>Phone No:</strong> <span style="color:#0bb2f0">{{ $mailData['shipping']['shipping_phone_number'] ?? ''}}</span></p>
                <p><strong>City Name:</strong> {{ $mailData['shipping']['shipping_city'] ?? ''}}</p>
                <p><strong>Country name:</strong>{{  $mailData['shipping']['shipping_address'] ?? '' }}</p>
                <p><strong>Country name:</strong>{{  $mailData['shipping']['shipping_state'] ?? '' }}</p>
                <p><strong>Zip <code></code>:</strong> {{  $mailData['shipping']['shipping_zip_code'] ?? ''}}</p>
                <p><strong>Zip <code></code>:</strong> {{  $mailData['shipping']['shipping_country'] ?? ''}}</p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0bb2f0" align="center" style="padding: 20px;" style="color:white">
                <p>&copy;vka3healthcare Portal. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
