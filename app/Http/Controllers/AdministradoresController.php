<?php

namespace App\Http\Controllers;


use App\Policies\administradorePolicy;
use Illuminate\Http\Request;
use App\Models\administradore;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministradoresController extends Controller
{
  public function index(administradore $administradore)
  {
    Gate::authorize('viewAny', $administradore);
    $administradores = administradore::where('estado', '=', 'activo')->get();

    $user = Auth::user();
    // Obtener el cliente
    $administrador = administradore::findOrFail($user->id);
    $adminTipo = $administrador->usuario;
    return view('/administrador/listado')->with('administradores', $administradores)->with('adminTipo', $adminTipo);
  }

  public function create(administradore $administradore)
  {
    Gate::authorize('create', $administradore);
    return view('/administrador/crear');
  }

  public function store(Request $request, administradore $administradore)
  {
    Gate::authorize('create', $administradore);
    //dd($request->all());
    $administradore = new administradore();


    $administradore->nombre = $request->nombre;
    $administradore->apellido = $request->apellido;
    $administradore->usuario = $request->usuario;
    $administradore->contrasena = Hash::make($request->contrasena);
    $administradore->imagen = 'admin_default.jpg';
    $administradore->rol = $request->rol;
    $administradore->estado = 'activo';

    $administradore->save();

    if ($request->hasFile('imagen')) {
      $img = $request->imagen;
      $nuevo = 'administradore_' . $administradore->id . '.' . $img->extension();
      $ruta = $img->storeAs('imagenes/administradores', $nuevo, 'public');
      $ruta = 'storage/' . $ruta;
      $administradore->imagen = asset($ruta);
      $administradore->save();
    }

    return redirect('/admin/listado');
  }

  public function editar($id, administradore $administradore)
  {
    Gate::authorize('update', $administradore);
    $administradore = Administradore::find($id);
    return view('/administrador/editar')->with('administradore', $administradore);
  }

  public function actualizar(Request $request, $id, administradore $administradore)
  {
    //dd($request->all());
    Gate::authorize('update', $administradore);
    $administradore = administradore::find($id);


    $administradore->nombre = $request->nombre;
    $administradore->apellido = $request->apellido;
    $administradore->usuario = $request->usuario;
    $administradore->contrasena = $request->contrasena;
    //$administradore->imagen=$request->imagen;
    $administradore->rol = $request->rol;
    //$administradore->estado='activo';


    $administradore->save();

    if ($request->hasFile('imagen')) {
      $img = $request->imagen;
      $nuevo = 'administradore_' . $administradore->id . '.' . $img->extension();
      $ruta = $img->storeAs('imagenes/administradores', $nuevo, 'public');
      $ruta = 'storage/' . $ruta;
      $administradore->imagen = asset($ruta);
      $administradore->save();
    }

    return redirect('/admin/listado');
  }


  public function mostrar($id, administradore $administradore)
  {
    Gate::authorize('viewAny', $administradore);
    $administradore = Administradore::find($id);
    return view('/administrador/mostrar')->with('administradore', $administradore);
  }

  public function destroy($id, administradore $administradore)
  {
    Gate::authorize('delete', $administradore);

    //dd($request->all());

    // $administradore->estado = 'inactivo';
    $administradorDos = administradore::findOrFail($id);
    $administradorDos->delete();
    // $administradore->save();
    // $administradore=administradore::find($id);
    // $administradore->delete();

    return redirect('/admin/listado');
  }


  // solo vistas
  public function inicioView()
  {

  }
  // termina solo vistas
}
