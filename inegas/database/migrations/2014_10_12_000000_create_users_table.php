<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('cargo');
            $table->string('area');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('color');
            $table->string('estado');
            $table->rememberToken();
            $table->timestamps();
        });

        $usuario = new User();
        $usuario -> nombre = 'Juan Perez';
        $usuario -> cargo = 'Encargado';
        $usuario -> email = 'admin@gmail.com';
        $usuario -> area = 'Activos Fijos - Suministros';
        $usuario -> estado = "Habilitado";
        $usuario -> color = "white";
        $usuario -> password = bcrypt('admin');
        $usuario -> save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
