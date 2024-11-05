<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
class ClienteAuthController extends Controller
{
    public function showForm()
    {
        return view('/login/logincliente');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'contrasena' => ['required'],
        ]);


        $Cliente = Cliente::where('correo', '=', $request->email)->where('estado', 'activo')->first();

        if ($Cliente && Hash::check($request->contrasena, $Cliente->contrasena)) {

            Auth::guard('cliente')->login($Cliente);

            $request->session()->regenerate();

            return redirect()->intended('/');
        }


        return back()->withErrors([
            'usuario' => 'The provided credentials do not match our records.',
        ])->onlyInput('usuario');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('cliente')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/cliente/login');
    }

    public function perfil()
    {
        $cliente = Auth::user(); // Obtener el cliente autenticado
        return view('/vistas_cliente/perfil', compact('cliente'));
    }

    // Eliminar la cuenta del cliente y cerrar sesión
    public function destroy2($id)
    {
        $cliente = Cliente::findOrFail($id);


        // Verificar que el usuario autenticado es el que se eliminará
        if ($cliente->id !== Auth::id()) {
            return redirect()->back()->with('errorBorrar', 'No tienes permisos para eliminar esta cuenta.');
        }

        // Eliminar la cuenta
        $cliente->delete();

        // Cerrar sesión
        Auth::logout();

        // Redirigir a la página de inicio con un mensaje
        return redirect('/')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
    }
}
