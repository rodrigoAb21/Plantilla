<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_estado', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha');
            $table->string('motivo');
            $table->boolean('visible');
            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estado')->onDelete('cascade');
            $table->unsignedInteger('activo_fijo_id');
            $table->foreign('activo_fijo_id')->references('id')->on('activo_fijo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_estado');
    }
}
