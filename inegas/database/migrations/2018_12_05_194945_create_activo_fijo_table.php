<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivoFijoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activo_fijo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto');
            $table->string('codigo');
            $table->boolean('disponibilidad');
            $table->float('costo_actual');
            $table->float('costo_ingreso');
            $table->string('serie');
            $table->string('marca');
            $table->string('color');
            $table->string('modelo');
            $table->string('caracteristicas');
            $table->boolean('visible');
            $table->unsignedInteger('grupo_a_id');
            $table->foreign('grupo_a_id')->references('id')->on('grupo_a')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activo_fijo');
    }
}
