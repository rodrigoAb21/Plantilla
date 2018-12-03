<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuministroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suministro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('stock_minimo');
            $table->integer('stock_maximo');
            $table->integer('stock');
            $table->string('marca');
            $table->string('codigo');
            $table->string('descripcion');
            $table->boolean('visible');
            $table->unsignedInteger('grupo_s_id');
            $table->unsignedInteger('unidad_medida_id');
            $table->foreign('grupo_s_id')->references('id')->on('grupo_s')->onDelete('cascade');
            $table->foreign('unidad_medida_id')->references('id')->on('unidad_medida')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suministro');
    }
}
