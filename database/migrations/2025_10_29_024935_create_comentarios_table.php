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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->bigInteger('id_usuarios')->nullable();
            $table->bigInteger('id_comentario')->nullable();
            $table->bigInteger('id_publicacion')->nullable();
            $table->string('contenido_comentario', 8000)->nullable();
            $table->date('fecha_publicacion_comentario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
