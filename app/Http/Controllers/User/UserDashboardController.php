<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserDashboardController extends Controller
{
    public function index(){
        return view('franted.Users.dashboard.index');
    }

    // User Logout--------
  
    public function logout(Request $request) 
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect('/');
    }
}
