<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('isAbleToCheckOut')) {
            return redirect('/cart1');
        }

        if(session()->has('isAbleToCheckOut')) {
            session()->reflash();
            if(session()->get('isAbleToCheckOut') == "no") {
                return redirect('/cart1');
            }
        }

        return $next($request);
    }
}
