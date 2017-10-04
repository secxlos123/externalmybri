<?php

namespace App\Http\Middleware;

use Closure;

class ApiIfAuthenticated
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
        if ( ! session('authenticate') ) {
            return redirect()->route('homepage');
        }
        
        return $next($request);
    }
}
