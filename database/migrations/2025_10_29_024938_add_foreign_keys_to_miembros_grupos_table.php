<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembros_grupos', function (Blueprint $table) {
            $table->foreign(['id_grupo'], 'miembros_grupos_id_grupo_fkey')->references(['id_grupo'])->on('grupos');
            $table->foreign(['id_usuarios'], 'miembros_grupos_id_usuarios_fkey')->references(['id'])->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miembros_grupos', function (Blueprint $table) {
            $table->dropForeign('miembros_grupos_id_grupo_fkey');
            $table->dropForeign('miembros_grupos_id_usuarios_fkey');
        });
    }
};
