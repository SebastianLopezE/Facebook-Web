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
        Schema::table('amigos', function (Blueprint $table) {
            $table->foreign(['solicitado_id'], 'amigos_solicitado_id_fkey')->references(['id'])->on('usuarios');
            $table->foreign(['solicitante_id'], 'amigos_solicitante_id_fkey')->references(['id'])->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amigos', function (Blueprint $table) {
            $table->dropForeign('amigos_solicitado_id_fkey');
            $table->dropForeign('amigos_solicitante_id_fkey');
        });
    }
};
