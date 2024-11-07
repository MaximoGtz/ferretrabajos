<?php
// este es mi cambio de ejemplo
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\TrabajadoreController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteAuthController;
use App\Http\Controllers\VistasCompartidasController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [VistasCompartidasController::class, 'inicio']);
Route::get('/nosotros', [VistasCompartidasController::class, 'nosotros']);
Route::get('/contacto', [VistasCompartidasController::class, 'contacto']);
Route::get('/servicios', [VistasCompartidasController::class, 'servicios']);
Route::get('/trabajadores/ver', [VistasCompartidasController::class, 'trabajadores']);



// INICIA LOGINS
Route::get('/login/cliente', function () {
    return view('/login/logincliente');
})->middleware('guest');

Route::get('/login/trabajador', function () {
    return view('/login/logintrabajador');
})->middleware('guest');
// TERMINA LOGINS


Route::middleware(['auth:administradore'])->group(function () {
    Route::view('/inicio/admin', '/compartidas/inicio')->name('inicio.admin');
    Route::view('/nosotros/admin', '/compartidas/nosotros')->name('nosotros.admin');
    Route::view('/servicios/admin', '/compartidas/servicios')->name('servicios.admin');
    Route::view('/contacto/admin', '/compartidas/contacto')->name('contacto.admin');
    Route::get('/trabajadores/admin', [TrabajadoreController::class, 'indexPublic']);


    Route::resource('trabajadore', App\Http\Controllers\TrabajadoreController::class);

    // EMPIEZA ADMINISTRADORES
    Route::get('/admin/listado', [AdministradoresController::class, 'index']);
    Route::get('/admin/crear', [AdministradoresController::class, 'create']);
    Route::post('/admin/guardar', [AdministradoresController::class, 'store']);
    Route::get('/admin/editar/{id}', [AdministradoresController::class, 'editar']);
    Route::put('/admin/actualizar/{id}', [AdministradoresController::class, 'actualizar']);
    Route::get('/admin/mostrar/{id}', [AdministradoresController::class, 'mostrar']);
    Route::delete('/admin/borrar/{id}', [AdministradoresController::class, 'destroy']);
    //TERMINA ADMINISTRADORES

    // EMPIEZA CLIENTES
    Route::get('/cliente/listadoc', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/crearc', [ClienteController::class, 'create']);
    Route::post('/cliente/guardar', [ClienteController::class, 'store']);
    Route::get('/cliente/editar/{id}', [ClienteController::class, 'edit']);
    Route::put('/cliente/actualizar/{id}', [ClienteController::class, 'update']);
    Route::get('/cliente/mostrar/{id}', [ClienteController::class, 'show']);
    Route::delete('/cliente/borrar/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
    // TERMINA CLIENTES

});

// admin login
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/login', [AdminAuthController::class, 'showForm'])->name('login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
// termina admin login

// cliente login   ----trabajando
Route::post('/cliente/login', [ClienteAuthController::class, 'login']);
Route::get('/cliente/login', [ClienteAuthController::class, 'showForm'])->name('login');
Route::post('/cliente/logout', [ClienteAuthController::class, 'logout']);
// termina cliente login

// trabajando
Route::get('/cliente/perfil', [ClienteAuthController::class, 'perfil'])->name('cliente.perfil')->middleware('auth:cliente');
Route::delete('/cliente/borra2/{id}', [ClienteAuthController::class, 'destroy2'])->name('cliente.destroy2')->middleware('auth:cliente');
// termina trabajando


Route::middleware(['auth:cliente'])->group(function () {
    Route::view('/inicio/cliente', '/compartidas/inicio')->name('inicio.cliente');
    Route::view('/nosotros/cliente', '/compartidas/nosotros')->name('nosotros.cliente');
    Route::view('/servicios/cliente', '/compartidas/servicios')->name('servicios.cliente');
    Route::view('/contacto/cliente', '/compartidas/contacto')->name('contacto.cliente');
    Route::get('cliente/contrato', [ClienteController::class, 'verContrato']);
    Route::get('/trabajadores/cliente', [TrabajadoreController::class, 'indexPublic']);
    Route::post('/cliente/agregar-producto', [ClienteController::class, 'agregarACarrito']);

});
