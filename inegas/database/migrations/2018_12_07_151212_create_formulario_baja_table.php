<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormularioBajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_baja', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('motivo');
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
        Schema::dropIfExists('formulario_baja');
    }
}
