<?php

namespace App\Http\Controllers\seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartamentoController extends Controller
{
    public function index()
    {
        return view('seguridad.departamentos.index');
    }


    public function create()
    {
        return view('activos.activos.create');
    }


    public function store(Request $request)
    {
        return redirect('act/activos');
    }


    public function edit($id)
    {
        return view('activos.activos.edit');
    }


    public function update(Request $request, $id)
    {
        return redirect('act/activos');
    }


    public function destroy($id)
    {
        return redirect('act/activos');
    }
}
