<?php

namespace App\Http\Controllers\activos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporteActController extends Controller
{
    public function inventario(){
        return view('activos.reportes-act.inventario');
    }
}
