<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuministroController extends Controller
{
    public function index()
    {
        return view('suministros.suministros.index');
    }


    public function create()
    {
        return view('suministros.suministros.create');
    }


    public function store(Request $request)
    {
        return redirect('suministros');
    }


    public function edit($id)
    {
        return view('suministros.suministros.edit');
    }

    public function show($id)
    {
        return view('suministros.suministros.show');
    }

    public function update(Request $request, $id)
    {
        return redirect('suministros');
    }


    public function destroy($id)
    {
        return redirect('suministros');
    }
}
