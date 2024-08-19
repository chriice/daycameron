<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelesTable extends Migration
{
    public function up()
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->bigIncrements('id_hotel');
            $table->string('nombre');
            $table->string('direccion');
            $table->unsignedBigInteger('id_ciudad');
            $table->timestamps();

            // Clave foránea
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudades')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoteles');
    }
}
