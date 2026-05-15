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
        Schema::table('publicaciones_grupos', function (Blueprint $table) {
            $table->foreign(['id_grupo'], 'publicaciones_grupos_id_grupo_fkey')->references(['id_grupo'])->on('grupos');
            $table->foreign(['id_usuario'], 'publicaciones_grupos_id_usuario_fkey')->references(['id'])->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publicaciones_grupos', function (Blueprint $table) {
            $table->dropForeign('publicaciones_grupos_id_grupo_fkey');
            $table->dropForeign('publicaciones_grupos_id_usuario_fkey');
        });
    }
};
