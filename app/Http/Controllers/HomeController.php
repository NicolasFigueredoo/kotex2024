<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMail;
use App\Models\Aplicacion;
use App\Models\CategoriaHome;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Red;
use App\Models\SliderHome;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //Sliders HOME
    public function obtenerSliders()
    {
        $sliders = SliderHome::all();
        return response()->json($sliders);
    }

    public function updateSlider(Request $request)
    {
        $slider = SliderHome::find($request->idSlider);
        $slider->orden = $request->orden;
        $slider->texto = $request->jsonCodigoSlider;

        if ($request->hasFile('foto')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('foto')->store('fotos');
            $slider->imagen = $photoPath;
        }

        $slider->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);

    }

    public function obtenerSliderHome($idSlider)
    {
        $slider = SliderHome::find($idSlider);
        return response()->json($slider);
    }

    //Categorias HOME
    public function obtenerCategorias()
    {
        $categorias = CategoriaHome::all();
        return response()->json($categorias);
    }

    public function updateCategoria(Request $request)
    {
        $categoria = CategoriaHome::find($request->idCategoria);
        $categoria->orden = $request->orden;
        $categoria->texto = $request->jsonCodigoSlider;

        if ($request->hasFile('foto')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('foto')->store('fotos');
            $categoria->imagen = $photoPath;
        }

        $categoria->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);

    }

    public function obtenerCategoriaHome($idCategoria)
    {
        $categoria = CategoriaHome::find($idCategoria);
        return response()->json($categoria);
    }

    public function obtenerSuscripciones(){
        $suscripciones = Suscripcion::all();
        return response()->json($suscripciones);
    }

    public function obtenerContacto(){
        $contacto = Contacto::all();

        return response()->json($contacto);
    }

    public function updateContacto(Request $request)
    {
        $contacto = Contacto::first();
        $contacto->direccion = $request->direccion;
        $contacto->email = $request->email;    
        $contacto->telefono = $request->telefono;    
        $contacto->instagram = $request->instagram;    
        $contacto->facebook = $request->facebook;    
        $contacto->whatsapp = $request->whatsapp;    

        $contacto->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    public function obtenerLogos(){
        $logos = Logo::all();
        return response()->json($logos);
    }


    public function obtenerLogo($idLogo){
        $logo = Logo::find($idLogo);
        return response()->json($logo);
    }

    public function updateLogo(Request $request)
    {
        $logo = Logo::find($request->idLogo);
        $logo->nombre = $request->nombre;    
        $logo->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }
}
