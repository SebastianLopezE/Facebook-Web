<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('InicioSesion');
    }

    public function login(Request $request)
    {
        // Valida los datos del formulario
        $ValidaCredenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // mapeo de credenciales
        $MapeoCredenciales = [
            'correo' => $ValidaCredenciales['email'],
            'password' => $ValidaCredenciales['password']
        ];

        // intenta el login
        if (Auth::attempt($MapeoCredenciales, true)) {
            $request->session()->regenerate();
            return redirect()->intended('Inicio');
        }

        // si falla
        return back()->withErrors([
            'email' => 'La contraseña que has introducido es incorrecta.',
        ])->onlyInput('email');
    }

    /* cierra la sesion del usuario*/
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
