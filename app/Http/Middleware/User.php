<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('status', 'Please Login');
        }elseif(Auth::user()->role =="admin"){
             return redirect()->route('adminDashboard');
        // }elseif(Auth::user()->role =="user"){
            // return redirect()->route('index');

        }else{
            return $next($request);
        }
    }
}
