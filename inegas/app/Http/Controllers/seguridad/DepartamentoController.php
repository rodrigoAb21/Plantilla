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
        return view('seguridad.departamentos.create');
    }


    public function store(Request $request)
    {
        return redirect('seg/departamentos');
    }


    public function edit($id)
    {
        return view('seguridad.departamentos.edit');
    }


    public function update(Request $request, $id)
    {
        return redirect('seg/departamentos');
    }


    public function destroy($id)
    {
        return redirect('seg/departamentos');
    }
}
