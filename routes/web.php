<?php
// este es mi cambio de ejemplo
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\TrabajadoreController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteAuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VistasCompartidasController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactoController;

Route::get('/', [VistasCompartidasController::class, 'inicio']);
Route::get('/nosotros', [VistasCompartidasController::class, 'nosotros']);
Route::get('/contacto', [VistasCompartidasController::class, 'contacto']);
Route::get('/servicios', [VistasCompartidasController::class, 'servicios']);
Route::get('/trabajadores/ver', [VistasCompartidasController::class, 'trabajadores']);




Route::middleware(['auth:administradore'])->group(function () {
    // VISTAS COMPARTIDAS
    Route::view('/inicio/admin', '/compartidas/inicio')->name('inicio.admin');
    Route::view('/nosotros/admin', '/compartidas/nosotros')->name('nosotros.admin');
    Route::view('/servicios/admin', '/compartidas/servicios')->name('servicios.admin');
    Route::view('/contacto/admin', '/compartidas/contacto')->name('contacto.admin');
    Route::get('/trabajadores/admin', [TrabajadoreController::class, 'indexPublic']);
    // TERMINA VISTAS COMPARTIDAS

    // EMPIEZA TRABAJADORES
    Route::resource('trabajadore', App\Http\Controllers\TrabajadoreController::class);
    // TERMINA TRABAJADORES

    // EMPIEZA ADMINISTRADORES CRUD
    Route::get('/admin/listado', [AdministradoresController::class, 'index']);
    Route::get('/admin/crear', [AdministradoresController::class, 'create']);
    Route::post('/admin/guardar', [AdministradoresController::class, 'store']);
    Route::get('/admin/editar/{id}', [AdministradoresController::class, 'editar']);
    Route::put('/admin/actualizar/{id}', [AdministradoresController::class, 'actualizar']);
    Route::get('/admin/mostrar/{id}', [AdministradoresController::class, 'mostrar']);
    Route::delete('/admin/borrar/{id}', [AdministradoresController::class, 'destroy']);
    //TERMINA ADMINISTRADORES CRUD

    // EMPIEZA CLIENTES CRUD
    Route::get('/cliente/listadoc', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/crearc', [ClienteController::class, 'create']);
    Route::post('/cliente/guardar', [ClienteController::class, 'store']);
    Route::get('/cliente/editar/{id}', [ClienteController::class, 'edit']);
    Route::put('/cliente/actualizar/{id}', [ClienteController::class, 'update']);
    Route::get('/cliente/mostrar/{id}', [ClienteController::class, 'show']);
    Route::delete('/cliente/borrar/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
    // TERMINA CLIENTES CRUD

});

// admin login
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/login', [AdminAuthController::class, 'showForm'])->name('login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
// termina admin login

// cliente login
Route::post('/cliente/login', [ClienteAuthController::class, 'login']);
Route::get('/cliente/login', [ClienteAuthController::class, 'showForm'])->name('login');
Route::post('/cliente/logout', [ClienteAuthController::class, 'logout']);
// termina cliente login


Route::middleware(['auth:cliente'])->group(function () {
    // VISTAS COMPARTIDAS
    Route::view('/inicio/cliente', '/compartidas/inicio')->name('inicio.cliente');
    Route::view('/nosotros/cliente', '/compartidas/nosotros')->name('nosotros.cliente');
    Route::view('/servicios/cliente', '/compartidas/servicios')->name('servicios.cliente');
    Route::view('/contacto/cliente', '/compartidas/contacto')->name('contacto.cliente');
    Route::get('/trabajadores/cliente', [TrabajadoreController::class, 'indexPublic']);
    // TERMINA VISTAS COMPARTIDAS
    // EMPIEZA FUNCIONES DE PERFIL
    Route::get('/cliente/perfil', [ClienteAuthController::class, 'perfil'])->name('cliente.perfil');
    Route::delete('/cliente/borra2/{id}', [ClienteAuthController::class, 'destroy2'])->name('cliente.destroy2');
    // TERMINA FUNCIONES DE PERFIL

    //CONTRATO Y CARRITO --trabajando
    Route::get('cliente/contrato', [ClienteController::class, 'verContrato'])->name('cliente.verContrato');

    //TERMINA CONTRATO Y CARRITO

    // trabajando MAX
    // Route::post('/cliente/agregar-producto', [ClienteController::class, 'agregarACarrito']);
    Route::post('/cliente/contratar_trabajador', [ClienteController::class, 'contratar_trabajador'])->name('clientes.contratar_trabajador');
    Route::delete('/cliente/eliminar_trabajador/{idTrabajador}', [ClienteController::class, 'eliminar_trabajador'])->name('clientes.eliminar_trabajador');
    Route::post('/cliente/crear_contrato', [ClienteController::class, 'crear_contrato'])->name('clientes.crear_contrato');

    // termina trabajando MAX
});

//ruta paypal
Route::post('pay',[PaymentController::class,'pay'])->name('payment');
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);
//termina paypal

//ruta contacto
Route::get('/contacto', [ContactoController::class, 'mostrarFormulario'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'enviarFormulario'])->name('contacto.enviar');
