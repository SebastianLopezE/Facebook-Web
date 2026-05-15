<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_registroUsuario()
    {
        Artisan::call('migrate');
        // vemos si carga correctamente el formilario de registro
        $respuesta = $this->get(route('registro.form'));
        $respuesta->assertStatus(200)->assertSee('Registrarte');

        // registro incorrecto
        $RegistroMal = $this->post(route('registro.submit'), [
            'nombre' => '',
            'apellido' => 'Perez',
            'correo' => 'prueba.com',
            'contraseña' => '123',
        ]);
        $RegistroMal->assertStatus(302)->assertRedirect(route('registro.form'))->assertSessionHasErrors(['nombre', 'correo', 'contraseña']);

        // registro correcto
        $RegistroCorrecto = $this->post(route('registro.submit'), [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'correo' => 'juan.perez@ejemplo.com',
            'contraseña' => 'contraseña123',
        ]); 
        $RegistroCorrecto->assertStatus(302)->assertRedirect('/InicioSesion')->assertSessionHas('success', 'cuenta creada');
    }
}
