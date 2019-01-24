<?php

use App\Reporte;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('fecha');
            $table->string('revision');
        });

        $reporte = new Reporte();
        $reporte -> codigo = ' ';
        $reporte -> fecha = ' ';
        $reporte -> revision = ' ';
        $reporte -> save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte');
    }
}
