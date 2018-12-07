<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_tras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activo_fijo_id');
            $table->foreign('activo_fijo_id')->references('id')->on('activo_fijo')->onDelete('cascade');
            $table->unsignedInteger('traslado_id');
            $table->foreign('traslado_id')->references('id')->on('traslado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_tras');
    }
}
