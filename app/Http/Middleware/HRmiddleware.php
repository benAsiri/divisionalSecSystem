<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HRmiddleware
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
            if(Auth::check()) {
              
            if(Auth::user()->position == 'Divisional Secretary') {

                    //return redirect('/');
                    return $next($request);  
                }
                else if(Auth::user()->position !='Asst.Divisional Secretary') {

                    return redirect('/');
                }
                else if(Auth::user()->position != 'Human Resources Operator') {

                    return redirect('/');
                }

                return $next($request);  
               

            } else {

                return $next($request);
            }
    }
}
