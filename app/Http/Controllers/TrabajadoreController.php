<?php

namespace App\Http\Controllers;

use App\Models\Trabajadore;
use Illuminate\Http\Request;

class TrabajadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trabajadores = Trabajadore::all();
        return view('admins.trabajadores', compact('trabajadores'));
        // return $trabajadores;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.crear_trabajador');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'correo'=>['required', 'unique:trabajadores',],
            'contrasena'=>'min:6|required_with:confirmar_contrasena|same:confirmar_contrasena',
            'confirmar_contrasena'=>'required | min:6',
            'rfc'=>'required',
            'imagen'=>'required|image',
        ]);
        // $trabajadore = Trabajadore::create($request->all());
        // $trabajadore->save();
        $trabajador = new Trabajadore();
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'imgs/trabajadores/';
            $filename = time()."-".$file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $trabajador->imagen= $destinationPath.$filename;
        }
        $trabajador->nombre = $request->nombre;
        $trabajador->apellido = $request->apellido;
        $trabajador->correo = $request->correo;
        $trabajador->contrasena = $request->contrasena;
        $trabajador->rfc = $request->rfc;
        // $trabajador->imagen = $request->imagen;
        $trabajador->especialidad = $request->especialidad;
        // if($request->hasFile('imagen')){
        //     $nombreimg = $trabajador->id.'.'.$request->file('imagen')->getClientOriginalExtension();
        //     $img = $request->file('imagen')->storeAs('public/img', $nombreimg);
        //     $trabajador->imagen = '/img/'.$nombreimg;
        // }
        $trabajador->save();
        return redirect()->route('trabajadore.index')->with('success', 'Trabajador creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trabajadore $trabajadore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trabajadore $trabajadore)
    {
        return view('admins.editar_trabajadores', compact('trabajadore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trabajadore $trabajadore)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' =>'required',
            'correo' => 'required',
            'contrasena' => 'required',
            'rfc' => 'required',
            'especialidad' =>'required'
        ]);
        if ($request->hasFile('imagen')) {

            $file = $request->file('imagen');
            $destinationPath = 'imgs/trabajadores/';
            $filename = time()."-".$file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $trabajadore->imagen= $destinationPath.$filename;
        }
        $trabajadore->update($request->input());
        return redirect()->route('trabajadore.index')->with('success', 'Trabajador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trabajadore $trabajadore)
    {
        $trabajadore->delete();
        return redirect()->route('trabajadore.index')->with('success', 'Trabajador eliminado correctamente');
    }
}
