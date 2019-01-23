<?php

use App\Ubicacion;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('visible');
            $table->unsignedInteger('area_id');
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');
        });

        $ubicacion = new Ubicacion();
        $ubicacion -> nombre = 'Almacen';
        $ubicacion -> visible = false;
        $ubicacion -> area_id = 1;
        $ubicacion -> save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion');
    }
}
