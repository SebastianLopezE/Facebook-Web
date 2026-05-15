<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PublicacionInicio;
use App\Models\User;

class PerfilPersonaController extends Controller
{
    // mostrar perfil de usuario autenticado
    public function mostrarPerfil($id = null)
    {
        if (!Auth::check()) {
            return redirect()->route('login.form');
        }


        if ($id === null) {
            $usuario_perfil = Auth::user();
        } else {
            // Buscar el usuario por ID
            $usuario_perfil = User::find($id);
            if (!$usuario_perfil) {
                return redirect()->route('perfil')->with('error', 'Usuario no encontrado');
            }
        }
        $usuario_actual = Auth::user();

        $publicaciones = PublicacionInicio::with('user')
            ->where('id_usuarios', $usuario_perfil->id)
            ->orderByDesc('fecha_publicacion')
            ->get();

        return view('Perfil_Persona', [
            'usuario' => $usuario_perfil,
            'usuario_actual' => $usuario_actual,
            'publicaciones' => $publicaciones,
        ]);
    }
}
