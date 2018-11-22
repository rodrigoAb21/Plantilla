<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        return view('suministros.mov-suministros.ingresos.index');
    }


    public function create()
    {
        return view('suministros.mov-suministros.ingresos.create');
    }


    public function store(Request $request)
    {
        return redirect('sum/mov-suministros/ingresos');
    }


    public function show($id)
    {
        return view('suministros.mov-suministros.ingresos.show');
    }



    public function destroy($id)
    {
        return redirect('sum/mov-suministros/ingresos');
    }
}
