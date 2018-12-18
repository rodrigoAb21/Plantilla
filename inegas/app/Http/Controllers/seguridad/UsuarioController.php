<?php

namespace App\Http\Controllers\seguridad;

use App\Bitacora;
use App\Tablas;
use App\User;
use App\Visitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        Visitas::incrementar(13);

        return view('seguridad.usuarios.index', ['usuarios' => $usuarios, 'busqueda' => trim($request['busqueda']), 'visitas' => Visitas::findOrFail(13)]);
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
        $usuario -> color = "white";
        $usuario -> password = bcrypt($request['password']);
        if ($usuario -> save()){
            Bitacora::registrar_accion(Tablas::$usuario, 'Creó al usuario con ID:'.$usuario->id);
        }

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
        if ($usuario -> save()){
            Bitacora::registrar_accion(Tablas::$usuario, 'Editó al usuario con ID:'.$usuario->id);
        }

        return redirect('seg/usuarios');
    }


    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario -> estado = "Deshabilitado";
        if ($usuario -> save()){
            Bitacora::registrar_accion(Tablas::$usuario, 'Deshabilitó al usuario con ID:'.$usuario->id);
        }
        return redirect('seg/usuarios');
    }

    public function habilitar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario -> estado = "Habilitado";
        if ($usuario -> save()){
            Bitacora::registrar_accion(Tablas::$usuario, 'Habilitó al usuario con ID:'.$usuario->id);
        }

        return redirect('seg/usuarios');
    }

    public function tema(){
        $u = User::findOrFail(Auth::user()->id);

        if ($u->color == 'white'){
            $u->color = 'black';
        }elseif ($u->color == 'black'){
            $u->color = 'red';
        }else{
            $u->color = 'white';
        }

        $u -> save();

        return redirect('login');

    }

}
