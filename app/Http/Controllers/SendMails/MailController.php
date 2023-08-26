<?php

namespace App\Http\Controllers\SendMails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $otp = rand(100000, 999999);

        $mailData = [
            'title' => 'Mail for OTP verify ',
            'otp' =>  $otp
        ];
         
        Mail::to('amarbahadur2410@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}