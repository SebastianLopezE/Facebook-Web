<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GruposController extends Controller
{
    public function mostrarGrupos()
    {
        if (!Auth::check()) {
            return redirect()->route('login.form');
        }

        return view('Grupos');
    }
}
