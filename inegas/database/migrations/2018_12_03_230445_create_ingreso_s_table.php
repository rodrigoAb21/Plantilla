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
            $table->date('fecha_ingreso');
            $table->string('proveedor');
            $table->string('foto_factura');
            $table->string('nro_factura');
            $table->date('fecha_factura');
            $table->string('estado');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
