<?php

namespace App\Http\Middleware;

use Closure;

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
        if(!auth()->user()->role_id){
            return redirect()->route('login');
        }

        if(auth()->user()->role_id == 1){
            return redirect()->route('manager');
        }

        if(auth()->user()->role_id == 2){
            return $next($request);
        }
    }
}
