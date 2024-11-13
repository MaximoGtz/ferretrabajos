<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class ContactoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('compartidas.contacto');
    }

    public function enviarFormulario(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ]);

        Mensaje::create($request->only('nombre', 'email', 'mensaje'));

        return back()->with('success', 'Tu mensaje ha sido guardado con éxito.');
    }
}
