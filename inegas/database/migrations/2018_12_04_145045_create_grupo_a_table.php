<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_a', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('visible');
            $table->unsignedInteger('linea_a_id');
            $table->foreign('linea_a_id')->references('id')->on('linea_a')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_a');
    }
}
