<?php

namespace App\Http\Middleware;

use Closure;

class AdminFilterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { if(Auth::check()){
        if(Auth::user()->position != 'Divisional Secretary'){

            return redirect('/');
        }
        return $next($request);
    }
    else
    {

        return $next($request);
    }
    }
}
