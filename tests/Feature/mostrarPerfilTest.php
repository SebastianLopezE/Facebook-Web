<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use App\Models\User;

class mostrarPerfilTest extends TestCase
{
    public function test_MostrarPerfil()
    {
        Artisan::call('migrate');
        $usuario = User::factory()->create();
        $this->actingAs($usuario);

        // carga correectante los perfiles
        $mostrarPerfil = $this->get(route('perfil'));
        $mostrarPerfil->assertStatus(200)->assertSee($usuario->nombre);
    }
}