<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
