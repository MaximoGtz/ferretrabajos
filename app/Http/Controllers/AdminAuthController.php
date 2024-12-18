<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\administradore;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminAuthController extends Controller
{

    public function showForm()
    {
        return view('/login/loginadministrador');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'usuario' => ['required'],
            'contrasena' => ['required'],
        ]);


        $administradore = administradore::where('usuario', '=', $request->usuario)->first(); /*->where('estado', 'activo')->first()*/

        if ($administradore && Hash::check($request->contrasena, $administradore->contrasena)) {

            Auth::guard('administradore')->login($administradore);

            $request->session()->regenerate();

            return redirect()->intended('/');
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
