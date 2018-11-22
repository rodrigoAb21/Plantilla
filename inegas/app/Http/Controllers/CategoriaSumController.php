<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaSumController extends Controller
{
    public function index()
    {
        return view('suministros.categorias.index');
    }


    public function create()
    {
        return view('suministros.categorias.create');
    }


    public function store(Request $request)
    {
        return redirect('sum/categorias-sum');
    }


    public function edit($id)
    {
        return view('suministros.categorias.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect('sum/categorias-sum');
    }


    public function destroy($id)
    {
        return redirect('sum/categorias-sum');
    }
}
