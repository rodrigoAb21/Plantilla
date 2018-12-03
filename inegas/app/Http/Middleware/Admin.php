<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::user()->area != 'Activos Fijos - Suministros'){
            if (Auth::user()->area == 'Activos Fijos'){
                return redirect('/act');
            }else{
                return redirect('/sum');
            }
        }
        return $next($request);
    }
}
