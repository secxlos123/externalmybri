<?php

namespace App\Http\Middleware;

use Closure;

class HasAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (session('authenticate.role') == $permission) {
            return $next($request);
        }else{
            return redirect()->route('homepage');
        }
    }
}
