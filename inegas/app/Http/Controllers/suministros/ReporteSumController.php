<?php

namespace App\Http\Controllers\suministros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporteSumController extends Controller
{
    public function inventario()
    {
        return view('suministros.reportes-sum.inventario');
    }

    public function movimientos()
    {
        return view('suministros.reportes-sum.movimientos');
    }

}
