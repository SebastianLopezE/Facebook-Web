<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class publicarPostTest extends TestCase
{
    public function test_PublicarPost()
    {
        Artisan::call('migrate');

        // publicacion incorrecta
        $usuario = User::factory()->create();
        $this->actingAs($usuario);
        
        $PublicacionMal = $this->from(route('inicio'))->post(route('PublicacionInicio'), ['contenido_publicacion' => '',]);

        $PublicacionMal->assertStatus(302)->assertRedirect(route('inicio'))->assertSessionHasErrors(['contenido_publicacion']);

        // publicacion correcta
        $conPublicacion = 'prueb publicacion';
        $respuesta = $this->post(route('PublicacionInicio'), ['contenido_publicacion' => $conPublicacion,]);

        $respuesta->assertStatus(302)->assertRedirect(route('inicio'))->assertSessionHas('status', 'Publicacion creada');
        $this->assertDatabaseHas('publicaciones', ['contenido_publicacion' => $conPublicacion, 'id_usuarios' => $usuario->id,]);
    }
}
