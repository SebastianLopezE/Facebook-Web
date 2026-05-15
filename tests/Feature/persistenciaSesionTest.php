<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class persistenciaSesionTest extends TestCase
{
    public function test_Persistencia()
    {
        Artisan::call('migrate');

        // verificamos  persistencia correcta
        $usuario = User::factory()->create([
            'password' => bcrypt('123456'),
            'correo' => 'usuario@ejemplo.com',
        ]);
        $respuesta = $this->post(route('login.submit'), [
            'email' => $usuario->correo,
            'password' => '123456',
        ]);
        $respuesta->assertStatus(302)->assertRedirect(route('inicio'));
        $this->assertAuthenticatedAs($usuario);
    }
}
