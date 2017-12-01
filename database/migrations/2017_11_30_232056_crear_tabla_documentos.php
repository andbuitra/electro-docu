<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('notas');
            $table->string('path');
            # Usario remitente
            $table->integer('usuario_id')->unsigned()->index();
            # ID del Usuario receptor
            $table->integer('receptor')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('documentos', function (Blueprint $table){
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('usuarios');
    }
}
