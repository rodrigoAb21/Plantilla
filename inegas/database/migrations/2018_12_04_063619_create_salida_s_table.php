<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidaSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_s', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('recibe');
            $table->string('observacion');
            $table->string('estado');
            $table->unsignedInteger('ubicacion_id');
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
        Schema::dropIfExists('salida_s');
    }
}
