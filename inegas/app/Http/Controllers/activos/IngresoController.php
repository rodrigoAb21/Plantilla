<?php

namespace App\Http\Controllers\activos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IngresoController extends Controller
{
    public function index()
    {
        return view('activos.mov-activos.ingresos.index');
    }


    public function create()
    {
        return view('activos.mov-activos.ingresos.create');
    }


    public function store(Request $request)
    {
        return redirect('act/mov-activos/ingresos');
    }


    public function edit($id)
    {
        return view('activos.mov-activos.ingresos.edit');
    }

    public function show($id)
    {
        return view('activos.mov-activos.ingresos.show');
    }

    public function update(Request $request, $id)
    {
        return redirect('act/mov-activos/ingresos');
    }


    public function destroy($id)
    {
        return redirect('act/mov-activos/ingresos');
    }
}
