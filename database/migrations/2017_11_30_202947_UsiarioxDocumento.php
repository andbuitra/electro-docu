<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsiarioxDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioXdocumento', function(Blueprint $table){
          $table->int('idUsuario');
          $table->int('idDocumento');
          $table->primary(['idUsuario','idDocumento']);
          $table->foreign('idUsuario')->references('id')->on('usuarios')->onDelete('cascade')->onUpgrade('cascade');
          $table->foreign('idDocumento')->references('id')->on('Documento')->onDelete('cascade')->onUpgrade('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('usuarioXdocumento');
    }
}
