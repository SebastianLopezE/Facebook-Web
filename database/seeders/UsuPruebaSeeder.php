<?php

// comando para correr los seeders: php artisan migrate:fresh --seed

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuPruebaSeeder extends Seeder
{
    // inserta 10 usuarios de prueba
    public function run()
    {
        User::factory()->count(10)->create();
    }
}
