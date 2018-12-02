<?php

namespace App\Http\Controllers\seguridad;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = DB::table('users')
            ->where('nombre','LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('cargo','LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('area','LIKE','%'.trim($request['busqueda']).'%')
            ->orWhere('estado','LIKE','%'.trim($request['busqueda']).'%')
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('seguridad.usuarios.index', ['usuarios' => $usuarios]);
    }


    public function create()
    {
        $areas = ['Activos Fijos', 'Suministros', 'Activos Fijos - Suministros'];
        return view('seguridad.usuarios.create', ['areas' => $areas]);
    }


    public function store(Request $request)
    {
        $usuario = new User();
        $usuario -> nombre = $request['nombre'];
        $usuario -> cargo = $request['cargo'];
        $usuario -> email = $request['email'];
        $usuario -> area = $request['area'];
        $usuario -> estado = "Habilitado";
        $usuario -> password = bcrypt($request['password']);
        $usuario -> save();

        return redirect('seg/usuarios');
    }


    public function edit($id)
    {
        $areas = ['Activos Fijos', 'Suministros', 'Activos Fijos - Suministros'];
        return view('seguridad.usuarios.edit', ['usuario' => User::findOrFail($id), 'areas' => $areas]);
    }


    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario -> nombre = $request['nombre'];
        $usuario -> cargo = $request['cargo'];
        $usuario -> email = $request['email'];
        $usuario -> area = $request['area'];
        if (trim($request['password']) != ""){
            $usuario -> password = bcrypt($request['password']);
        }
        $usuario -> save();

        return redirect('seg/usuarios');
    }


    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario -> estado = "Deshabilitado";
        $usuario -> save();

        return redirect('seg/usuarios');
    }

    public function habilitar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario -> estado = "Habilitado";
        $usuario -> save();

        return redirect('seg/usuarios');
    }


}
