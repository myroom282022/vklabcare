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
                <p>Hello there,</p>
                <p>We're excited to share some important healthcare information with you:</p>
                <p>
                    For click this link verify OTP <a href="{{ url('otp/login', ['user_id' => $mailData['user_id'], 'otp' => $mailData['otp']]) }}"><button type="submit" style=" height:30px;color:white;background-color:#0bb2f0;border-color:#0bb2f0;border-radius:5px;margin-left:10px" class="btn btn-info mx-3">Click me</button></a>.
                </p>
                <p class="m-auto text-info my-3" style="color:#0bb2f0">OR</p>
                <p>Your One-Time Password (OTP) for copy to verify OTP: <strong style="color:#0bb2f0">{{ $mailData['otp'] }}</strong></p>
                <p>
                    Please ensure to keep your OTP confidential and do not share it with anyone.
                </p>
                <p>If you have any questions or concerns, feel free to <a href="mailto:vkhealthcare.com">contact us</a>.</p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0bb2f0" align="center" style="padding: 20px;" style="color:white">
                <p>&copy; 2023 vka3healthcare Portal. All rights reserved.</p>
            </td>
        </tr>
    </table>
   

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</body>
</html>
