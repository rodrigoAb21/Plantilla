<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class solicitar_sum
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
        $area= Auth::user()->area;
        if ( $area!== 'Ninguno'){
            if($area == 'Activos Fijos'){
                return redirect('/act');
            }else{
                return redirect('/sum');
            }
        }
        return $next($request);
    }
}
