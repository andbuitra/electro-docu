<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use function foo\func;

class CreatePermitidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permitidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('departamento_permitido', function(Blueprint $table){
            //$table->increments('id');
            $table->integer('departamento_id')->unsigned()->index();
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->integer('permitido_id')->unsigned()->index();
            $table->foreign('permitido_id')->references('id')->on('permitidos');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permitidos');
    }
}
