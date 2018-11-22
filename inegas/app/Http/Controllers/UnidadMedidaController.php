<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        return view('suministros.medidas.index');
    }


    public function create()
    {
        return view('suministros.medidas.create');
    }


    public function store(Request $request)
    {
        return redirect('sum/medidas');
    }


    public function edit($id)
    {
        return view('suministros.medidas.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect('sum/medidas');
    }


    public function destroy($id)
    {
        return redirect('sum/medidas');
    }


}
