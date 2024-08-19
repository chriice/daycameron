<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id_cliente');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dui', 10)->unique();
            $table->date('fecha_nacimiento');
            $table->string('genero', 1);
            $table->string('telefono');
            $table->string('correo')->unique();
            $table->string('direccion');
            $table->unsignedBigInteger('id_invitados');
            $table->timestamps();

            // Clave foránea
            $table->foreign('id_invitados')->references('id_invitados')->on('invitados')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
