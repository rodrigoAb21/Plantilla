<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        return view('suministros.mov-suministros.salidas.index');
    }


    public function create()
    {
        return view('suministros.mov-suministros.salidas.create');
    }


    public function store(Request $request)
    {
        return redirect('sum/mov-suministros/salidas');
    }


    public function show($id)
    {
        return view('suministros.mov-suministros.salidas.show');
    }

    public function destroy($id)
    {
        return redirect('sum/mov-suministros/salidas');
    }
}
