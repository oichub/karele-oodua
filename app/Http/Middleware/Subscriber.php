<?php

namespace App\Http\Middleware;

use App\Subscriber as AppSubscriber;
use Closure;
use Illuminate\Support\Facades\Auth;

class Subscriber
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
    //   $video = AppSubscriber::where('id', Auth::user()->id)->pluck('user_id')->get();

        if(!Auth::check()){
            return redirect()->route('login')->with('status', 'Please Login');

        }elseif(Auth::user()->id ==''){
            //  return redirect()->route('index');
        return $next($request);
        }else{
            return redirect()->route('usersdashboard');

        // }else{

        }
    }

}
