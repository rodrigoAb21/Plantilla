<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_a', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_ingreso');
            $table->date('fecha_factura');
            $table->string('foto_factura');
            $table->string('nro_factura');
            $table->string('proveedor');
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
        Schema::dropIfExists('ingreso_a');
    }
}
