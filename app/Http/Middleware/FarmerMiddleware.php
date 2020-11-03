<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Auth;
use Illuminate\Http\Response;

class FarmerMiddleware
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
        if(Auth()->user()->role == 'farmer'){
            return $next($request);
        }
        else{
            return new Response(View('unauthorised')->with('message', 'This page is only authorised to Farmers'));
        }
    }
}
