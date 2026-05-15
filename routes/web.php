<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\PerfilPersonaController;
use App\Http\Controllers\GruposController;


Route::get('/InicioSesion', function () {
    return view('InicioSesion');
});

Route::get('/Inicio', function () {
    return view('Inicio');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTAS DE AUTENTICACIÓN (LOGIN Y LOGOUT) ---

// Muestra el formulario de inicio de sesión cuando visitas la página principal
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');

// Procesa los datos del formulario de inicio de sesión
Route::post('/', [LoginController::class, 'login'])->name('login.submit');

// Cierra la sesión del usuario
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// --- RUTAS DE REGISTRO ---
// Muestra el formulario para crear una cuenta nueva
Route::get('/registro', [RegistroController::class, 'create'])->name('registro.form');
Route::post('/registro', [RegistroController::class, 'NuevosUsuarios'])->name('registro.submit');

// RUTAS DE INICIO
Route::get('/Inicio', [InicioController::class, 'create'])->middleware('auth')->name('inicio');

// ruta para guardar publicacion
Route::post('/PublicacionInicio', [InicioController::class, 'Pulicar'])->middleware('auth')->name('PublicacionInicio');

// RUTAS PARA COMENTARIOS
Route::post('/comentario/guardar', [InicioController::class, 'guardarComentario'])->middleware('auth')->name('comentario.guardar');
Route::get('/comentarios/{publicacionId}', [InicioController::class, 'obtenerComentarios'])->middleware('auth')->name('comentarios.obtener');


// --- RUTA PRINCIPAL (PROTEGIDA) ---


Route::get('/InicioPrueba', function () {
    return view('InicioPrueba');
});


Route::get('/Perfil_Persona/{id?}', [PerfilPersonaController::class, 'mostrarPerfil'])->middleware('auth')->name('perfil');

Route::get('/vistaVideo', function () {
    return view('vistaVideo');
});

Route::get('/Marketplace', [MarketplaceController::class, 'mostrarMarketplace'])->middleware('auth')->name('marketplace');

Route::get('/Grupos', [GruposController::class, 'mostrarGrupos'])->middleware('auth')->name('grupos');

Route::get('/amigos', function () {
    return view('amigos');
})->middleware('auth')->name('amigos');

use App\Http\Controllers\ComentarioController;

Route::middleware(['auth'])->group(function () {
    Route::get('/comentarios/{id}', [ComentarioController::class, 'index']);
    Route::post('/comentario/guardar', [ComentarioController::class, 'store']);
});
