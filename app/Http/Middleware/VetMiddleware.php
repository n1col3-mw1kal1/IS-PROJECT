<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use App\Http\Controllers\Auth;

class VetMiddleware
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
        if(Auth()->user()->role == 'vet'){
            return $next($request);
        }
        else{
            return new Response(View('unauthorised')->with('message', 'This page is only authorised to Vets'));
        }
    }
}
