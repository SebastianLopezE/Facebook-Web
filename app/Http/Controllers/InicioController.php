<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicacionInicio;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InicioController extends Controller
{
    public function guardarComentario(Request $request)
    {
        $request->validate([
            'id_publicacion' => 'required|exists:publicaciones,id_publicacion',
            'contenido_comentario' => 'required|string|max:8000',
        ]);

        $comentario = \App\Models\Comentario::create([
            'id_usuarios' => Auth::user()->id,
            'id_publicacion' => $request->id_publicacion,
            'contenido_comentario' => $request->contenido_comentario,
            'fecha_publicacion_comentario' => Carbon::now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comentario guardado',
            'comentario' => $comentario
        ]);
    }

    public function obtenerComentarios($publicacionId)
    {
        $comentarios = \App\Models\Comentario::where('id_publicacion', $publicacionId)
            ->with('user')
            ->orderBy('fecha_publicacion_comentario', 'desc')
            ->get();

        return response()->json($comentarios);
    }

    public function create()
    {
        $publicaciones = PublicacionInicio::with('user')->latest('fecha_publicacion')->get();
        return view('inicio', [
            'publicaciones' => $publicaciones
        ]);
    }

    public function Pulicar(Request $request)
    {
        $request->validate([
            'contenido_publicacion' => 'required|string|max:255',
        ]);

        PublicacionInicio::create([
            'contenido_publicacion' => $request->contenido_publicacion,
            'id_usuarios' => Auth::User()->id,
            'fecha_publicacion' => Carbon::now()
        ]);

        return redirect()->route('inicio')->with('status', 'Publicacion creada');
    }
}
