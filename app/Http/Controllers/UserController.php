<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function show(Request $request)
    {
        $usuario = $request->usuario;
        $contraseña = $request->contraseña;

        $user = Usuario::where('usuario', $usuario)->first();

        if ($user) {
            if (Hash::check($contraseña, $user->password)) {
                return response()->json($user->id);
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json(false);
        }
    }

    public function store(Request $request)
    {
        $usuario = $request->usuario;
        $email = $request->email;
        $contraseña = Hash::make($request->contraseña);
        $rol = $request->rol;

        $user = new Usuario();
        $user->usuario = $usuario;
        $user->email = $email;
        $user->rol = $rol;
        $user->password = $contraseña;
        $user->save();

        return response()->json($usuario);
    }

    public function update(Request $request)
    {
        $idUsuario = $request->idUsuario;

        $usuario = Usuario::findOrFail($idUsuario);
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;

        $usuario->save();

        return response()->json($usuario);
    }

    public function destroy($idUsuario)
    {
        $user = Usuario::findOrFail($idUsuario);
        $user->delete();
        $usuarios = Usuario::all();



        return response()->json($usuarios);
    }

    public function obtenerUsuarios()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function obtenerUsuario($idUsuario)
    {

        $usuario = Usuario::where('id', $idUsuario)->first();
        return response()->json($usuario);

      
    }
}
