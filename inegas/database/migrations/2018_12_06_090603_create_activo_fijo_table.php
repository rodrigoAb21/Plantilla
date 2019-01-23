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
            $table->string('disponibilidad');
            $table->float('costo_actual');
            $table->float('costo_ingreso');
            $table->string('serie');
            $table->string('marca');
            $table->string('color');
            $table->string('modelo');
            $table->string('caracteristicas');
            $table->boolean('visible');
            $table->unsignedInteger('grupo_a_id');
            $table->unsignedInteger('ingreso_a_id');
            $table->unsignedInteger('trabajador_id');
            $table->unsignedInteger('ubicacion_id');
            $table->foreign('grupo_a_id')->references('id')->on('grupo_a')->onDelete('cascade');
            $table->foreign('ingreso_a_id')->references('id')->on('ingreso_a')->onDelete('cascade');
            $table->foreign('trabajador_id')->references('id')->on('trabajador')->onDelete('cascade');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacion')->onDelete('cascade');
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
