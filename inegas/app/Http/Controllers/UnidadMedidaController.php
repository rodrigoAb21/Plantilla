<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        return view('medidas.index');
    }


    public function create()
    {
        return view('medidas.create');
    }


    public function store(Request $request)
    {
        return redirect('medidas');
    }


    public function edit($id)
    {
        return view('medidas.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect('medidas');
    }


    public function destroy($id)
    {
        return redirect('medidas');
    }


}
