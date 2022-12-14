<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
class AdminLoginContrroller extends Controller
{


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

        return redirect("login")->withSuccess(' You have Registered Successfully');
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
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.dashboard')->with('success',' Login succefully');;
            }
            return redirect()->route('login')->with('error','Credencial not match');
        }
            return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
    }



    // Admin Logout--------
    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}