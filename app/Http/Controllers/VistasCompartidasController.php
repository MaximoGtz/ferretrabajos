<?php

namespace App\Http\Controllers;
use App\Models\Trabajadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VistasCompartidasController extends Controller
{
    public function inicio(Request $request)
    {
        // Verificar si no hay ningún usuario autenticado
        if (!auth()->check() && !Auth::guard('administradore')->check() && !Auth::guard('cliente')->check()) {
            // El usuario no está autenticado en ningún guardia
            return view('compartidas/inicio');
        }

        // Verificar si el usuario está autenticado como 'administradore'
        if (Auth::guard('administradore')->check()) {
            return redirect('inicio/admin');
        }

        // Verificar si el usuario está autenticado como 'cliente' (opcional, si necesitas manejar esto)
        if (Auth::guard('cliente')->check()) {
            return redirect('inicio/cliente');
        }

        // Si el usuario está autenticado pero no coincide con ningún guardia específico
        return view('compartidas/inicio');

    }
    public function nosotros(Request $request)
    {
        // Verificar si no hay ningún usuario autenticado
        if (!auth()->check() && !Auth::guard('administradore')->check() && !Auth::guard('cliente')->check()) {
            // El usuario no está autenticado en ningún guardia
            return view('compartidas/nosotros');
        }

        // Verificar si el usuario está autenticado como 'administradore'
        if (Auth::guard('administradore')->check()) {
            return redirect('nosotros/admin');
        }

        // Verificar si el usuario está autenticado como 'cliente' (opcional, si necesitas manejar esto)
        if (Auth::guard('cliente')->check()) {
            return redirect('nosotros/cliente');
        }

        // Si el usuario está autenticado pero no coincide con ningún guardia específico
        return view('compartidas/nosotros');

    }
    public function contacto(Request $request)
    {
        // Verificar si no hay ningún usuario autenticado
        if (!auth()->check() && !Auth::guard('administradore')->check() && !Auth::guard('cliente')->check()) {
            // El usuario no está autenticado en ningún guardia
            return view('compartidas/contacto');
        }

        // Verificar si el usuario está autenticado como 'administradore'
        if (Auth::guard('administradore')->check()) {
            return redirect('contacto/admin');
        }

        // Verificar si el usuario está autenticado como 'cliente' (opcional, si necesitas manejar esto)
        if (Auth::guard('cliente')->check()) {
            return redirect('contacto/cliente');
        }

        // Si el usuario está autenticado pero no coincide con ningún guardia específico
        return view('compartidas/contacto');

    }
    public function servicios(Request $request)
    {
        // Verificar si no hay ningún usuario autenticado
        if (!auth()->check() && !Auth::guard('administradore')->check() && !Auth::guard('cliente')->check()) {
            // El usuario no está autenticado en ningún guardia
            return view('compartidas/servicios');
        }

        // Verificar si el usuario está autenticado como 'administradore'
        if (Auth::guard('administradore')->check()) {
            return redirect('servicios/admin');
        }

        // Verificar si el usuario está autenticado como 'cliente' (opcional, si necesitas manejar esto)
        if (Auth::guard('cliente')->check()) {
            return redirect('servicios/cliente');
        }

        // Si el usuario está autenticado pero no coincide con ningún guardia específico
        return view('compartidas/servicios');

    }
    public function trabajadores(Request $request)
    {
        // Verificar si no hay ningún usuario autenticado
        if (!auth()->check() && !Auth::guard('administradore')->check() && !Auth::guard('cliente')->check()) {
            // El usuario no está autenticado en ningún guardia
            $trabajadores = Trabajadore::all();
            return view('compartidas/trabajadores', compact('trabajadores'));
        }

        // Verificar si el usuario está autenticado como 'administradore'
        if (Auth::guard('administradore')->check()) {
            return redirect('trabajadores/admin');
        }

        // Verificar si el usuario está autenticado como 'cliente' (opcional, si necesitas manejar esto)
        if (Auth::guard('cliente')->check()) {
            return redirect('trabajadores/cliente');
        }
        $trabajadores = Trabajadore::all();
        return view('compartidas/trabajadores', compact('trabajadores'));
    }
    
}