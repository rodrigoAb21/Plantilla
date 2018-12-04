<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_i_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->float('precio_unitario');
            $table->unsignedInteger('suministro_id');
            $table->unsignedInteger('ingreso_s_id');
            $table->foreign('suministro_id')->references('id')->on('suministro')->onDelete('cascade');
            $table->foreign('ingreso_s_id')->references('id')->on('ingreso_s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_i_s');
    }
}
