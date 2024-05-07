<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Catalogo;
use App\Models\CategoriaHome;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\MetaDatos;
use App\Models\Seccion;
use App\Models\Servicio;
use App\Models\SliderHome;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //Sliders HOME
    public function obtenerSliders()
    {

        $sliders = SliderHome::orderBy('orden', 'asc')->get();


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
        $categorias = CategoriaHome::orderBy('orden', 'asc')->get();
        return response()->json($categorias);
    }

    public function updateCategoria(Request $request)
    {
        $categoria = CategoriaHome::find($request->idCategoria);
        $categoria->orden = $request->orden;

        if ($request->hasFile('foto')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('foto')->store('fotos');
            $categoria->imagen = $photoPath;
        }

        $categoria->save();

        return response()->json(['message' => 'Categoría actualizada con éxito'], 200);

    }

    public function obtenerCategoriaHome($idCategoria)
    {
        $categoria = CategoriaHome::find($idCategoria);
        return response()->json($categoria);
    }

    //BANNERS
    public function obtenerBanner()
    {
        $banners = Banner::all();
        return response()->json($banners);
    }

    public function updateBanner(Request $request)
    {
        $banner = Banner::find($request->idBanner);
        $banner->titulo = $request->bannerTitulo;
        $banner->texto = $request->bannerTexto;

        if ($request->hasFile('foto')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('foto')->store('fotos');
            $banner->imagen = $photoPath;
        }

        $banner->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);

    }

    //NOSOTROS
    //Secciones
    public function obtenerSecciones()
    {
        $secciones = Seccion::orderBy('orden', 'asc')->get();
        return response()->json($secciones);
    }

    public function obtenerSeccion($idSeccion)
    {
        $seccion = Seccion::find($idSeccion);
        return response()->json($seccion);
    }

    public function updateSeccion(Request $request)
    {
        $seccion = Seccion::find($request->idSeccion);
        $seccion->orden = $request->orden;
        $seccion->titulo = $request->titulo;
        $seccion->texto = $request->texto;
        $seccion->icono = $request->icono;
        $seccion->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);

    }

   //CONTACTO

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
   //LOGO

    public function obtenerLogos(){
        $logos = Logo::first();
        return response()->json($logos);
    }


    public function obtenerLogo($idLogo){
        $logo = Logo::find($idLogo);
        return response()->json($logo);
    }

    public function updateLogo(Request $request)
    {
        $logo = Logo::first();

        if ($request->hasFile('logoNav')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('logoNav')->store('fotos');
            $logo->imagen = $photoPath;
        }

        if ($request->hasFile('logoFooter')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('logoFooter')->store('fotos');
            $logo->imagen2 = $photoPath;
        }
    

        $logo->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }


    //servicios
    public function obtenerServicios(){
        $servicios = Servicio::orderBy('orden', 'asc')->get();;
        return response()->json($servicios);
    }


    public function obtenerServicio($idServicio){
        $servicio = Servicio::find($idServicio);
        return response()->json($servicio);
    }

    public function updateServicio(Request $request)
    {
        $servicio = Servicio::find($request->idServicio);
        $servicio->orden = $request->orden;    
        $servicio->texto = $request->texto;    
        $servicio->icono = $request->icono;    
        $servicio->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    //CATALOGO
    public function obtenerCatalogo(){
        $catalogo = Catalogo::first();
        $rutaArchivo = $catalogo->file;
        if (Storage::exists($rutaArchivo)) {
            $tipoMime = Storage::mimeType($rutaArchivo);

            return response()->file(storage_path('app/' . $rutaArchivo), ['Content-Type' => $tipoMime]);
        } else {
            return response()->json(['error' => 'El archivo no existe'], 404);
        }
        
    }

    public function updateCatalogo(Request $request){



        
        if ($request->hasFile('file')) {
          
            return response()->json('entro');

        }else{
            return response()->json($request);

        }
        
    }

    //METADATOS

    public function obtenerMetadatos(){
        $metadatos = MetaDatos::all();
        return response()->json($metadatos);

    }

    public function obtenerMetadato($idMetadato){
        $metadato = MetaDatos::find($idMetadato);
        return response()->json($metadato);
    }

    public function updateMetadato(Request $request){
        $metadatos = MetaDatos::all();
        foreach ($metadatos as $meta) {
            $metadato = MetaDatos::find($meta['id']);
            $metadato->claves = $request->claves;
            $metadato->save();
        }

        return response()->json($metadatos);
    }

  

    



}
