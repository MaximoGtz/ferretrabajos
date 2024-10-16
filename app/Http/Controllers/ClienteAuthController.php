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
            'usuario' => ['required'],
            'contrasena' => ['required'],
        ]);


        $Cliente = Cliente::where('usuario', '=', $request->usuario)->where('estado', 'activo')->first();

        if ($Cliente && Hash::check($request->contrasena, $Cliente->contrasena)) {

            Auth::guard('administradore')->login($Cliente);

            $request->session()->regenerate();

            return redirect()->intended('/inicio');
        }


        return back()->withErrors([
            'usuario' => 'The provided credentials do not match our records.',
        ])->onlyInput('usuario');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('administradore')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
