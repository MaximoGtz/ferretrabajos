<?php
// este es mi cambio de ejemplo
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteAuthController;

// rutas compartidas
Route::view('/inicio', '/compartidas/inicio');
Route::view('/nosotros', '/compartidas/nosotros');
Route::view('/servicios', '/compartidas/servicios');
Route::view('/contacto', '/compartidas/contacto');
// termina rutas comprartidas

// trabajando
// Route::post('/login/admin', function () {
//     return view('/login/formulario');
// });
Route::get('/login/cliente', function () {
    return view('/login/logincliente');
});
Route::get('/login/trabajador', function () {
    return view('/login/logintrabajador');
});
Route::view('/', '/compartidas/inicio');
// termina trabajando



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
    Route::get('/cliente/listadoc', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/crearc', [ClienteController::class, 'create']);
    Route::post('/cliente/guardar', [ClienteController::class, 'store']);
    Route::get('/cliente/editar/{id}', [ClienteController::class, 'edit']);
    Route::put('/cliente/actualizar/{id}', [ClienteController::class, 'update']);
    Route::get('/cliente/mostrar/{id}', [ClienteController::class, 'show']);
    // Route::delete('/cliente/borrar/{id}', [ClienteController::class, 'destroy']);
    Route::delete('/cliente/borrar/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

    // termina parte de juan


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
