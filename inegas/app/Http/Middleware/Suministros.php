<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Suministros
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
        $area = Auth::user()->area;
        if ($area == 'Ninguno'){
            return redirect('/solicitar_sum');
        }
        if ($area == 'Activos Fijos'){
            return redirect('/act');
        }

        return $next($request);
    }
}
