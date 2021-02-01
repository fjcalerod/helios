<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if(!auth()->check())
            return redirect('login');
        
        if ((auth()->user()->rol !=1)) 
            //No es administrador
            return redirect('home');
        
        
        return $next($request);
    }
}
