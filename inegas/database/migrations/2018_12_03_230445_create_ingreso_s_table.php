<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_s', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha_ingreso');
            $table->string('proveedor');
            $table->string('foto_factura');
            $table->string('nro_factura');
            $table->timestamp('fecha_factura');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso_s');
    }
}
