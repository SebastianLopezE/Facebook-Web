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
        Schema::table('comentarios', function (Blueprint $table) {
            $table->foreign(['id_publicacion'], 'comentarios_id_publicacion_fkey')->references(['id_publicacion'])->on('publicaciones');
            $table->foreign(['id_usuarios'], 'comentarios_id_usuarios_fkey')->references(['id'])->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropForeign('comentarios_id_publicacion_fkey');
            $table->dropForeign('comentarios_id_usuarios_fkey');
        });
    }
};
