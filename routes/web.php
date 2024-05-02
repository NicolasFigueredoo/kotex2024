<?php

use App\Http\Controllers\AplicacionController ;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VariacionesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImagenController;
use App\Models\CategoriaHome;

Route::get('/', function () {
    return view('welcome');
});




//productos
Route::get('/api/obtenerProductos', [VariacionesController::class, 'index']);
Route::get('/api/obtenerProductoName/{name}', [VariacionesController::class, 'obtenerProductosXname']);

Route::get('/api/obtenerProductosDeLinea', [VariacionesController::class, 'getProductosLinea']);
Route::get('/api/obtenerProductosEspeciales', [VariacionesController::class, 'getProductosEspeciales']);
Route::get('/api/obtenerProductosDestacados', [VariacionesController::class, 'getProductosDestacados']);

Route::get('/api/obtenerInformacionProducto/{productoId}', [VariacionesController::class, 'obtenerInformacionProducto']);
Route::get('/api/obtenerNombresProducto/{categoriaId}', [VariacionesController::class, 'obtenerNombresProducto']);
Route::get('/api/obtenerMedidasProducto', [VariacionesController::class, 'obtenerMedidasProducto']);
Route::get('/api/obtenerColorProducto/{productoId}', [VariacionesController::class, 'obtenerColorProducto']);
Route::get('/api/obtenerUnidadVenta', [VariacionesController::class, 'obtenerUnidadVenta']);
Route::get('/api/obtenerProductosIdAplicacion/{aplicacionId}', [VariacionesController::class, 'obtenerProductosIdAplicacion']);


//categorias
Route::get('/api/obtenerCategorias', [CategoriaController::class, 'index']);

//correos
Route::post('/enviarCorreo', [EmailsController::class, 'enviarCorreoContacto']);
Route::post('/api/enviarPresupuesto', [EmailsController::class, 'enviarPresupuesto']);



//usuarios
Route::post('/api/crearUsuario', [UserController::class, 'store']);
Route::post('/api/verificarLogin', [UserController::class, 'show']);


//ADMIN

//home
Route::get('/api/obtenerSliders', [AdminController::class, 'obtenerSliders']);
Route::post('/api/updateSlider', [AdminController::class, 'updateSlider']);
Route::get('/api/obtenerSliderHome/{idSlider}', [AdminController::class, 'obtenerSliderHome']);

//getimagen
Route::get('/api/getImage/{fileName}', [ImagenController::class, 'getImage']);

//categorias
Route::get('/api/obtenerCategoriasHome', [AdminController::class, 'obtenerCategorias']);
Route::post('/api/updateCategoriaHome', [AdminController::class, 'updateCategoria']);
Route::get('/api/obtenerCategoriaHome/{idCategoria}', [AdminController::class, 'obtenerCategoriaHome']);

//banners
Route::get('/api/obtenerBanner', [AdminController::class, 'obtenerBanner']);
Route::get('/api/obtenerBanners', [AdminController::class, 'obtenerBanner']);
Route::post('/api/updateBanner', [AdminController::class, 'updateBanner']);

//Valores
Route::get('/api/obtenerSecciones', [AdminController::class, 'obtenerSecciones']);
Route::post('/api/updateSeccion', [AdminController::class, 'updateSeccion']);
Route::get('/api/obtenerSeccion/{idSeccion}', [AdminController::class, 'obtenerSeccion']);


//usuarios
Route::get('/api/obtenerUsuarios', [UserController::class, 'obtenerUsuarios']);
Route::get('/api/obtenerIdUsuario/{idUsuario}', [UserController::class, 'obtenerUsuario']);
Route::post('/api/updateUsuario', [UserController::class, 'update']);
Route::get('/api/deleteUsuario/{idUsuario}', [UserController::class, 'destroy']);

//suscripciones
Route::post('/api/enviarMensajeSub', [EmailsController::class, 'enviarMensajeSub']);
Route::post('/api/agregarSuscripcion', [SuscripcionController::class, 'agregarSuscripcion']);
Route::get('/api/obtenerSuscripciones', [SuscripcionController::class, 'obtenerSuscripciones']);
Route::get('/api/deleteSuscripcion/{idSuscripcion}', [SuscripcionController::class, 'deleteSuscripcion']);

//contactos
Route::get('/api/obtenerContacto', [AdminController::class, 'obtenerContacto']);
Route::post('/api/updateContacto', [AdminController::class, 'updateContacto']);


//logos
Route::get('/api/obtenerLogos', [AdminController::class, 'obtenerLogos']);
Route::get('/api/obtenerLogo/{idLogo}', [AdminController::class, 'obtenerLogo']);
Route::post('/api/updateLogo', [AdminController::class, 'updateLogo']);


//servicios
Route::get('/api/obtenerServicios', [AdminController::class, 'obtenerServicios']);
Route::get('/api/obtenerServicio/{idServicio}', [AdminController::class, 'obtenerServicio']);
Route::post('/api/updateServicio', [AdminController::class, 'updateServicio']);

//aplicaciones
Route::get('/api/aplicaciones', [AplicacionController::class, 'index']);
Route::get('/api/obtenerAplicacion/{idAplicacion}', [AplicacionController::class, 'obtenerAplicacion']);
Route::post('/api/updateAplicacion', [AplicacionController::class, 'update']);
Route::post('/api/crearAplicacion', [AplicacionController::class, 'store']);
Route::post('/api/deleteAplicacion', [AplicacionController::class, 'delete']);

//catalogo
Route::get('/api/obtenerCatalogo', [AdminController::class, 'obtenerCatalogo']);
Route::post('/api/updateCatalogo', [AdminController::class, 'updateCatalogo']);

//productos
Route::post('/api/crearProducto', [VariacionesController::class, 'crearProducto']);
Route::get('/api/obtenerProductos', [VariacionesController::class, 'obtenerProductos']);
Route::get('/api/obtenerProducto/{idProducto}', [VariacionesController::class, 'obtenerProducto']);
Route::post('/api/updateProducto/', [VariacionesController::class, 'updateProducto']);

//metadatos
Route::get('/api/obtenerMetadatos', [AdminController::class, 'obtenerMetadatos']);
Route::get('/api/obtenerMetadato/{idMetadato}', [AdminController::class, 'obtenerMetadato']);
Route::post('/api/updateMetadato/', [AdminController::class, 'updateMetadato']);
