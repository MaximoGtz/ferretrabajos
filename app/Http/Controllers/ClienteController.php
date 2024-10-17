<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{

    public function index()
    {
        //Select*fromClientes
        $clientes = Cliente::all();
        // $clientes=Cliente::where('estado','=','activo')->get();
        return view('/cliente/listadoc')->with('clientes', $clientes);
    }

    public function create()
    {
        return view('/cliente/crearc');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();


        $cliente->id = $request->id;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->correo = $request->correo;
        $cliente->contraseña = $request->contraseña;
        $cliente->imagen = 'cliente_default.jpg';
        $cliente->estado = $request->estado;
        $cliente->red_social = $request->red_social;
        $cliente->verificacion = $request->verificacion;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;

        $cliente->save();

        if ($request->hasFile('imagen')) {
            $img = $request->imagen;
            $nuevo = 'cliente_1' . $cliente->id . '.' . $img->extension();
            $ruta = $img->storeAs('imagen/clientes', $nuevo, 'public');
            $ruta = 'storage/' . $ruta;
            $cliente->imagen = asset($ruta);
            $cliente->save();

        }


        return redirect('/cliente/listadoc');
    }

    public function edit($id)
    {

        $cliente = Cliente::find($id);
        return view('/cliente/editar')->with('cliente', $cliente);

    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);


        $cliente->id = $request->id;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->correo = $request->correo;
        $cliente->contraseña = $request->contraseña;
        // $cliente->imagen=$request->imagen;
        $cliente->estado = $request->estado;
        $cliente->red_social = $request->red_social;
        $cliente->verificacion = $request->verificacion;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;

        $cliente->save();


        if ($request->hasFile('imagen')) {
            $img = $request->imagen;
            $nuevo = 'cliente_1' . $cliente->id . '.' . $img->extension();
            $ruta = $img->storeAs('imagen/clientes', $nuevo, 'public');
            $ruta = 'storage/' . $ruta;
            $cliente->imagen = asset($ruta);
            $cliente->save();

        }


        return redirect('/cliente/listadoc');

    }

    public function show($id)
    {
        $cliente = Cliente::find($id);




        return view('/cliente/mostrar')->with('cliente', $cliente);


    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        $cliente->estado = 'inactivo';

        $cliente->delete();

        $cliente->save();

        return redirect('/cliente/listadoc');


    }

}