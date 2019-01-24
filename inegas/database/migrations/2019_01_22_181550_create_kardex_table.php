<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kardex', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_mov');
            $table->unsignedInteger('id_mov');
            $table-> unsignedInteger('id_sum');
            $table->dateTime('fecha_mov');
            $table->integer('cantidad');
            $table->integer('saldo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
