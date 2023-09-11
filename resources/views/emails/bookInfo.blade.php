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
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px;">
                <p>Hello Admin,</p>
                <p>I hope this message finds you well. I wanted to share some information about a book that I believe may be of interest to you:</p>
                <p>This person is context from booking health package</p>
                <p>Name <strong style="color:#0bb2f0">{{ $bookData['userData']['name'] ?? ''}}</strong></p>
                <p>email id. <strong style="color:#0bb2f0">{{ $bookData['userData']['email'] ?? ''}}</strong></p>
                <p>Phone No. <strong style="color:#0bb2f0">{{ $bookData['userData']['phone_number'] ?? ''}}</strong></p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px;">
                <h1 style="color:#0bb2f0">Product Details</h1>
                <p><strong>Name:</strong> {{ $bookData['product']['product_name'] ?? ''}}</p>
                <p><strong>Description:</strong> {{  $bookData['product']['product_description'] ?? ''}}</p>
                <p><strong>Price: ₹</strong>{{  $bookData['product']['product_price'] ?? '' }}</p>
                <img src="{{url('storage/Product/img/'.$bookData['product']['product_image'])}}"
                    class="img-fluid rounded-3">
            </td>
            <td bgcolor="#ffffff" style="padding: 20px;">
                <h1 style="color:#0bb2f0">Address Details</h1>
                <p><strong>City Name:</strong> {{ $bookData['deviceData']['cityName'] ?? ''}}</p>
                <p><strong>Zip <code></code>:</strong> {{  $bookData['deviceData']['zipCode'] ?? ''}}</p>
                <p><strong>Country name:</strong> ${{  $bookData['deviceData']['countryName'] ?? '' }}</p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0bb2f0" align="center" style="padding: 20px;" style="color:white">
                <p>&copy; 2023 vka3healthcare Portal. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
