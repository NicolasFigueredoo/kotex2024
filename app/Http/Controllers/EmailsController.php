<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMail;
use App\Mail\PresupuestoMail;
use App\Mail\SuscripcionMail;
use App\Models\Contacto;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use ReCaptcha\ReCaptcha;

class EmailsController extends Controller
{
    public function enviarCorreoContacto(Request $request){


        $recaptchaSecret = $request->recaptchaSecret;
        $recaptchaToken = $request->recaptchaToken;

        $recaptcha = new ReCaptcha($recaptchaSecret);
        $response = $recaptcha->verify($recaptchaToken, $request->ip());

        if ($response->isSuccess()) {

        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $email = $request->email;
        $celular = $request->celular;
        $mensaje = $request->mensaje;

        $contacto = Contacto::first();

        Mail::to($contacto->email)->send(new ContactoMail($nombre, $apellido, $email,$celular,$mensaje));
        return response()->json(['message' => 'mensajes enviados'], 200);

    }
    else{
        return response()->json(['error' => 'El reCAPTCHA no se validó correctamente.']);
    }
        


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

        $recaptchaSecret = $request->recaptchaSecret;
        $recaptchaToken = $request->recaptchaToken;

        $recaptcha = new ReCaptcha($recaptchaSecret);
        $response = $recaptcha->verify($recaptchaToken, $request->ip());

        if ($response->isSuccess()) {

        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $celular = $request->celular;
        $email = $request->email; 
        $mensaje = $request->mensaje;
        $productos = $request->productos;
        $file = $request->file('file');

        $contacto = Contacto::first();
        Mail::to($contacto->email)->send(new PresupuestoMail($nombre, $apellido,$email,$celular,$mensaje,$productos,$file));

        return response()->json(['message' => 'mensajes enviados'], 200);
        }else{
            return response()->json(['error' => 'El reCAPTCHA no se validó correctamente.']);

        }

    }
}
