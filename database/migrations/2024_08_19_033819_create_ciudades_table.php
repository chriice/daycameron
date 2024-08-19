<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->bigIncrements('id_ciudad');
            $table->string('nombre');
            $table->unsignedBigInteger('id_pais');
            $table->timestamps();

            // Clave foránea
            $table->foreign('id_pais')->references('id_pais')->on('paises')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ciudades');
    }
}

