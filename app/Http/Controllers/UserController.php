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
                return response()->json(1);
            } else {
                return response()->json(['message' => 'Contraseña incorrecta']);
            }
        } else {
            return response()->json(['message' => 'Usuario no encontrado']);
        }
    }

    public function store(Request $request)
    {
        $usuario = $request->usuario;
        $email = $request->email;
        $contraseña = Hash::make($request->contraseña);

        $user = new Usuario();
        $user->usuario = $usuario;
        $user->email = $email;
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
