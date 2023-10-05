<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index(){
        return view('franted.Users.dashboard.index');
    }

    public function updateProfile(){
        return view('franted.Users.dashboard.profile');
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
