<?php

// comando para correr los seeders: php artisan migrate:fresh --seed

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    // inserta roles
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'nombre_rol' => 'admin'
            ],
            [
                'id' => 2,
                'nombre_rol' => 'usuario'
            ],
        ]);
    }
}
