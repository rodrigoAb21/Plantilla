<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevaluoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revaluo', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha');
            $table->float('monto');
            $table->string('tipo');
            $table->string('motivo');
            $table->string('estado');
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
        Schema::dropIfExists('revaluo');
    }
}
