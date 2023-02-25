<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
class AdminLoginContrroller extends Controller
{
     /*
    |--------------------------------------------------------------------------
    |Admin login and Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function registration()
    {
        return view('admins.auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
         User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);

        return redirect("admin/login")->withSuccess(' You have Registered Successfully');
    }

   //login 
    public function login()
    {
        return view('admins.auth.login');
    }  

    public function postLogin(Request $request)
    {   
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success',' Login succefully');;
            }
            return redirect()->route('admin-login')->with('error','Credencial not match');
        }
            return redirect()->route('admin-login')->with('error','Email-Address And Password Are Wrong.');
    }



    // Admin Logout--------
    public function logout() {
        Auth::logout();
        return redirect('admin/login');
    }
}