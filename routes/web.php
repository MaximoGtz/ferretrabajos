<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProductosController;


// rutas compartidas
Route::view('/inicio', '/compartidas/inicio');
Route::view('/nosotros', '/compartidas/nosotros');
Route::view('/servicios', '/compartidas/servicios');
Route::view('/contacto', '/compartidas/contacto');
// termina rutas comprartidas

Route::get('/', function () {
    return view('/login/formulario');
});


Route::middleware(['auth:administradore'])->group(function () {
    Route::resource('trabajadore', App\Http\Controllers\TrabajadoreController::class);
    // parte de jair
    Route::get('/admin/listado', [AdministradoresController::class, 'index']);
    Route::get('/admin/crear', [AdministradoresController::class, 'create']);
    Route::post('/admin/guardar', [AdministradoresController::class, 'store']);
    Route::get('/admin/editar/{id}', [AdministradoresController::class, 'editar']);
    Route::put('/admin/actualizar/{id}', [AdministradoresController::class, 'actualizar']);
    Route::get('/admin/mostrar/{id}', [AdministradoresController::class, 'mostrar']);
    Route::delete('/admin/borrar/{id}', [AdministradoresController::class, 'destroy']);
    // termina parte de jair
    // parte de juan
    Route::get('/cliente/listadoc', [ClienteController::class, 'index']);
    Route::get('/cliente/crearc', [ClienteController::class, 'create']);
    Route::post('/cliente/guardar', [ClienteController::class, 'store']);
    Route::get('/cliente/editar/{id}', [ClienteController::class, 'edit']);
    Route::put('/cliente/actualizar/{id}', [ClienteController::class, 'update']);
    Route::get('/cliente/mostrar/{id}', [ClienteController::class, 'show']);
    Route::delete('/cliente/borrar/{id}', [ClienteController::class, 'destroy']);
    // termina parte de juan


});
Route::view('/productos', '/tareapis/catalogo');
Route::view('/productos/detalle', '/tareapis/detalle');

Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/login', [AdminAuthController::class, 'showForm'])->name('login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

// TAREA DE PRODUCTOS API
Route::get('/catalogo', [ApiProductosController::class, 'index']);
Route::get('/catalogo/detalle{id}', [ApiProductosController::class, 'show']);
// TERMINA TAREA DE PRODUCTOS API
