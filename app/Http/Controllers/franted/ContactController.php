<?php

namespace App\Http\Controllers\franted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactController extends Controller
{
    public function index(){
        $contactData = ContactInfo::latest()->first();
        return view('franted.contact.index',compact('contactData'));
    }
}
