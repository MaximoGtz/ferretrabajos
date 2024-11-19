<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Trabajadore;
use App\Models\Carrito;
use App\Models\Contrato;
use App\Models\TrabajadoresCarrito;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => ['required', 'email', 'unique:clientes'],
            'contrasena' => 'required',
            'red_social' => 'required',
            'imagen' => 'required',
            'estado' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'


        ]);
        $cliente->id = $request->id;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->correo = $request->correo;
        $cliente->contrasena = Hash::make($request->contrasena);
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
        ;


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

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => ['required', 'email', 'unique:clientes'],
            'contrasena' => 'required',
            'red_social' => 'required',
            'imagen' => 'required',
            'estado' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'


        ]);

        $cliente->id = $request->id;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->correo = $request->correo;
        $cliente->contrasena = $request->contrasensa;
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
        ;


        return redirect('/cliente/listadoc');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);




        return view('/cliente/mostrar')->with('cliente', $cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        // Redirige o muestra un mensaje de éxito
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente.');
    }


    // solo vistas
    public function verContrato()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $cliente = Cliente::findOrFail($userId);
        $contrato = $cliente->contratos()->latest()->first();
        if (!$contrato) {
            $contrato = $cliente->contratos()->create([
                // agregar cualquier dato necesario de la orden
            ]);
        }
        $carrito = $contrato->carrito;
        if (!$carrito) {
            $carrito = $contrato->carrito()->create([]);
        }
        $trabajadoresCarrito = $carrito->trabajadores;
        // Obtener al cliente junto con su carrito y contar los trabajadores
        $trabajadoresCount = $carrito->trabajadores->count();
        $costo = 0;
        if (!$trabajadoresCount) {
            $costo = 0;
        } else {
            for ($i = 0; $i < $trabajadoresCount; $i++) {
                # code...
                $costo += 400;
            }
        }
        return view('vistas_cliente.contrato', compact('user', 'trabajadoresCarrito', 'trabajadoresCount', 'costo'));
    }


    public function contratar_trabajador(Request $request)
    {
        // Validar que el ID de producto esté en la solicitud
        $request->validate([
            'trabajador_id' => 'required|exists:trabajadores,id',
        ]);

        $user = Auth::user();
        // Obtener el cliente
        $cliente = Cliente::findOrFail($user->id);
        // Obtener o crear la última orden del cliente
        $contrato = $cliente->contratos()->latest()->first();
        if (!$contrato) {
            $contrato = $cliente->contratos()->create([
                // agregar cualquier dato necesario de la orden
            ]);
        }
        $carrito = $contrato->carrito;
        if (!$carrito) {
            $carrito = $contrato->carrito()->create([]);
        }

        $trabajador = Trabajadore::findOrFail($request->trabajador_id);
        // Obtener el trabajador
        $trabajadorId = $request->trabajador_id;

        // Añadir el trabajador al carrito (evita duplicados automáticamente)
        $carrito->trabajadores()->syncWithoutDetaching([$trabajadorId]);

        return redirect()->route('cliente.verContrato')->with('success', 'Trabajador agregado correctamente');
    }
    public function eliminar_trabajador($idTrabajador)
    {
        $user = Auth::user();
        // Obtener el cliente
        $cliente = Cliente::findOrFail($user->id);
        // Obtener o crear la última orden del cliente
        $contrato = $cliente->contratos()->latest()->first();
        if (!$contrato) {
            $contrato = $cliente->contratos()->create([
                // agregar cualquier dato necesario de la orden
            ]);
        }
        $carrito = $contrato->carrito;
        if (!$carrito) {
            $carrito = $contrato->carrito()->create([]);
        }

        // Eliminar el trabajador del carrito
        $carrito->trabajadores()->detach($idTrabajador);

        return redirect()->route('cliente.verContrato')->with('success', 'Trabajador eliminado correctamente');
    }
    public function crear_contrato(Request $request)
    {
        $validates = $request->validate([
            'cliente_id' => 'required | numeric',
            'descripcion' => 'required|min:20',
            'fecha_cita' => 'required|date',
            'costo' => 'required | numeric',
            'estado' => 'required | string'
        ]);
        $contrato = Contrato::create([
            'cliente_id' => $validates['cliente_id'],
            'fecha_cita' => $validates['fecha_cita'],
            'descripcion' => $validates['descripcion'],
            'costo' => $validates['costo'],
            'estado' => $validates['estado']
        ]);
        $user = Auth::user();
        // Obtener el cliente
        $cliente = Cliente::findOrFail($user->id);
        $contrato = $cliente->contratos()->latest()->first();

        $carrito = $contrato->carrito();
        return redirect('inicio/cliente');
    }
    public function ver_contratos($idCliente)
    {
        $userId = Auth::id();
        $cliente = Cliente::findOrFail($userId);

        return view('vistas_cliente.ver_contratos', compact('user', 'trabajadoresCarrito', 'trabajadoresCount', 'costo'));
    }
    public function subir_contrato($requestInfo){
        
        $contrato = Contrato::create([
            'cliente_id' => $requestInfo['cliente_id'],
            'fecha_cita' => $requestInfo['fecha_cita'],
            'descripcion' => $requestInfo['descripcion'],
            'costo' => $requestInfo['costo'],
            'estado' => $requestInfo['estado']
        ]);
    }
}
