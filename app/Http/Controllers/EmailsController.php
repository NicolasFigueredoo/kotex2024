<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMail;
use App\Mail\PresupuestoMail;
use App\Mail\SuscripcionMail;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function enviarCorreoContacto(Request $request){

        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $email = $request->email;
        $celular = $request->celular;
        $mensaje = $request->mensaje;

        Mail::to('kotexsrl@hotmail.com')->send(new ContactoMail($nombre, $apellido, $email,$celular,$mensaje));
        

        return response()->json(['message' => 'mensajes enviados'], 200);

    }
    public function enviarMensajeSub(Request $request){
        $suscripciones = Suscripcion::all();

        $asunto = $request->asunto;
        $texto = $request->texto;

        foreach ($suscripciones as $suscripcion) {
            Mail::to($suscripcion->email)->send(new SuscripcionMail($asunto, $texto));
        }

        return response()->json(['message' => 'mensajes enviados'], 200);

    }

    public function enviarPresupuesto(Request $request){

        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $celular = $request->celular;
        $email = $request->email; 
        $mensaje = $request->mensaje;
        $productos = $request->productos;
        $file = $request->file('file');


        Mail::to('kotexsrl@hotmail.com')->send(new PresupuestoMail($nombre, $apellido,$email,$celular,$mensaje,$productos,$file));

        return response()->json(['message' => 'mensajes enviados'], 200);

    }
}
