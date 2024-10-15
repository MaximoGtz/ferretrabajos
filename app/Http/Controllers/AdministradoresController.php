<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\administradore;
use Illuminate\Support\Facades\Hash;

class AdministradoresController extends Controller
{
  public function index(){
   // $administradores=administradore::all();
    $administradores=administradore::where('estado','=','activo')->get();
 return view('/administrador/listado')->with('administradores',$administradores);
  }

  public function create(){
return view('/administrador/crear');
  }

  public function store(Request $request){
    //dd($request->all());
    $administradore=new administradore();
    

    $administradore->nombre=$request->nombre;
    $administradore->apellido=$request->apellido;
    $administradore->usuario=$request->usuario;
    $administradore->contrasena=Hash::make($request->contrasena);
    $administradore->imagen='admin_default.jpg';
    $administradore->rol=$request->rol;
    $administradore->estado='activo';
    
    $administradore->save();

    if($request->hasFile('imagen')){
      $img=$request->imagen;
      $nuevo='administradore_'.$administradore->id.'.'.$img->extension();
      $ruta=$img->storeAs('imagenes/administradores',$nuevo,'public');
      $ruta='storage/'.$ruta;
      $administradore->imagen=asset($ruta);
      $administradore->save();
    }

 return redirect('/admin/listado'); 
  }

public function editar($id){
  $administradore = Administradore::find($id);
  return view('/administrador/editar')->with('administradore', $administradore);
}

public function actualizar(Request $request,$id){
  //dd($request->all());
  $administradore=administradore::find($id);
  

  $administradore->nombre=$request->nombre;
  $administradore->apellido=$request->apellido;
  $administradore->usuario=$request->usuario;
  $administradore->contrasena=$request->contrasena;
  //$administradore->imagen=$request->imagen;
  $administradore->rol=$request->rol;
  //$administradore->estado='activo';
  

  $administradore->save();

  if($request->hasFile('imagen')){
    $img=$request->imagen;
    $nuevo='administradore_'.$administradore->id.'.'.$img->extension();
    $ruta=$img->storeAs('imagenes/administradores',$nuevo,'public');
    $ruta='storage/'.$ruta;
    $administradore->imagen=asset($ruta);
    $administradore->save();
  }

return redirect('/admin/listado'); 
}


public function mostrar($id){
  $administradore = Administradore::find($id);
  return view('/administrador/mostrar')->with('administradore', $administradore);
}

public function destroy(Request $request,$id){
  //dd($request->all());
  $administradore=administradore::find($id);
  
  $administradore->estado='inactivo';
  
  $administradore->save();
  
  //$administradore=administradore::find($id);
  //$administradore->delete()

return redirect('/admin/listado'); 
}

}
