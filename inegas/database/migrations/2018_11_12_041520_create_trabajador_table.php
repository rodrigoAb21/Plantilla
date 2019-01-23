<?php

use App\Trabajador;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('cargo');
            $table->boolean('visible');
            $table->unsignedInteger('area_id');
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');
            $table->timestamps();
        });

        $trabajador = new Trabajador();
        $trabajador -> nombre = 'Inegas';
        $trabajador -> cargo = ' ';
        $trabajador -> visible = false;
        $trabajador -> area_id = 1;
        $trabajador -> save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajador');
    }
}
