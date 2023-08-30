<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\UserDetails;
class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role == 'user'){
            $userDetails=UserDetails::where('user_id',auth()->user()->id)->first();
            if($userDetails->is_phone_verified === 1 || $userDetails->is_email_verified === 1){
                return $next($request);
            }
        }
        return redirect('otp/login')->with('error',"You don't have  access.");
    }
}
