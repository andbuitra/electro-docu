<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            $table->string('nombres');
            $table->increments('id');
            $table->string('apellidos');
            $table->string('cedula')->unique();
            $table->string('email')->unique();
            $table->string('rol')->default('user');            
            $table->string('vercode');
            $table->string('verified')->default('0');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();           
        });

        # Crea la relación al crear la tabla de usuario para que no haya error
        Schema::table('empleados', function (Blueprint $table){
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
        Schema::dropIfExists('usuarios');
    }
}
