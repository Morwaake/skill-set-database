<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Adept
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
            return redirect()->route('login');
        }

        //role 1 = adept
        if(Auth::user()->role == 1){
            return $next($request);
        }
        if(Auth::user()->role == 2){
            return redirect()->route('Stakeholder');
        }
    }
}
