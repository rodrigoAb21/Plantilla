<?php

namespace App\Http\Controllers\activos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaActController extends Controller
{
    public function index()
    {
        return view('activos.categorias.index');
    }


    public function create()
    {
        return view('activos.categorias.create');
    }


    public function store(Request $request)
    {
        return redirect('act/categorias-act');
    }


    public function edit($id)
    {
        return view('activos.categorias.edit');
    }

    public function show($id)
    {
        return view('activos.categorias.show');
    }

    public function update(Request $request, $id)
    {
        return redirect('act/categorias-act');
    }


    public function destroy($id)
    {
        return redirect('act/categorias-act');
    }
}
