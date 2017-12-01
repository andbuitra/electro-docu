<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->boolean('externo');
            $table->timestamps();
        });
        Schema::create('permiso_usuario', function (Blueprint $table) {
          $table->integer('usuario_id')->unsigned()->index();
          $table->foreign('usuario_id')->references('id')->on('usuarios');

          $table->integer('permiso_id')->unsigned()->index();
          $table->foreign('permiso_id')->references('id')->on('permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
