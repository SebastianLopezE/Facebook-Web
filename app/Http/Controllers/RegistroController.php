<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    // Mostrar el formulario de registro
    public function create()
    {
        return view('CrearCuenta');
    }

    // validar los nuevos usuarios en la bd
    public function NuevosUsuarios(Request $request)
    {

        $messages = [
            'nombre.required' => '¿Cómo te llamas? El nombre es obligatorio.',
            'apellido.required' => '¿Cuál es tu apellido? Es necesario para el registro.',
            'correo.required' => 'Necesitarás un correo electrónico para iniciar sesión.',
            'correo.email' => 'El correo electrónico que ingresaste no es válido.',
            'correo.unique' => 'Este correo electrónico ya está registrado en otra cuenta.',
            'contraseña.required' => 'Ingresa una contraseña nueva.',
            'contraseña.min' => 'Tu contraseña debe tener al menos 6 caracteres de longitud.',
        ];
        // se ejecuta la validacion de los datos del formulario con los mensajes
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => ['required', 'string', 'email', 'max:255', Rule::unique('usuarios', 'correo')],
            'contraseña' => 'required|string|min:6',
        ], $messages);
        // si la validacion pasa, inserta el usuario
        User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'contraseña' => Hash::make($request->contraseña),
        ]);

        // redirigir al inicio
        return redirect('InicioSesion')->with('success', 'cuenta creada');
    }
}
