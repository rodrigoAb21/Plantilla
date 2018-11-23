<?php

namespace App\Http\Controllers\activos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivoController extends Controller
{
    public function index()
    {
        return view('activos.activos.index');
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
