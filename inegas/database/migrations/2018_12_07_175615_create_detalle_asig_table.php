<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleAsigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_asig', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activo_fijo_id');
            $table->foreign('activo_fijo_id')->references('id')->on('activo_fijo')->onDelete('cascade');
            $table->unsignedInteger('asignacion_id');
            $table->foreign('asignacion_id')->references('id')->on('asignacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_asig');
    }
}
