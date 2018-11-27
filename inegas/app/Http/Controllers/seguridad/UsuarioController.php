<?php

namespace App\Http\Controllers\seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('seguridad.usuarios.index');
    }


    public function create()
    {
        return view('seguridad.usuarios.create');
    }


    public function store(Request $request)
    {
        return redirect('seg/usuarios');
    }


    public function edit($id)
    {
        return view('seguridad.usuarios.edit');
    }


    public function update(Request $request, $id)
    {
        return redirect('seg/usuarios');
    }


    public function destroy($id)
    {
        return redirect('seg/usuarios');
    }
}
