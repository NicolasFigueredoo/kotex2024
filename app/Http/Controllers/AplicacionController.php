<?php

namespace App\Http\Controllers;

use App\Models\Aplicacion;
use App\Models\Variacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AplicacionController extends Controller
{
    public function index()
    {
        $aplicaciones = Aplicacion::orderBy('orden', 'asc')->get();
        return response()->json($aplicaciones);
    }

    public function store(Request $request)
    {


        $aplicacion = new Aplicacion();
        $aplicacion->orden = $request->orden;
        $aplicacion->nombre = $request->nombre;
    
        if ($request->hasFile('imagen')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('imagen')->store('fotos');
            $aplicacion->imagen = $photoPath;
        }

        $aplicacion->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    public function obtenerAplicacion($idAplicacion)
    {
        $aplicacion = Aplicacion::find($idAplicacion);
        return response()->json($aplicacion);
    }
    public function update(Request $request)
    {
        $aplicacion = Aplicacion::find($request->idAplicacion);
        $aplicacion->orden = $request->orden;
        $aplicacion->nombre = $request->nombre;

        if ($request->hasFile('imagen')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('imagen')->store('fotos');
            $aplicacion->imagen = $photoPath;
        }

        $aplicacion->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);

    }
    public function delete(Request $request)
    {
        $aplicacion = Aplicacion::find($request->idAplicacion);
        $aplicacion->delete();

        return response()->json(['message' => 'Aplicacion Eliminada'], 200);
    }

}
