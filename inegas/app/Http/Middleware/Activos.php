<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Activos
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
        if ($area == 'Suministros'){
            return redirect('/sum');
        }
        if ($area == 'Ninguno'){
            return redirect('/solicitar_sum');
        }
        return $next($request);
    }
}
