<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->bigIncrements('id_habitacion');
            $table->text('comentarios')->nullable();
            $table->unsignedBigInteger('id_hotel');
            $table->unsignedBigInteger('id_tipo_habitacion');
            $table->string('estado');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_hotel')->references('id_hotel')->on('hoteles')->onDelete('cascade');
            $table->foreign('id_tipo_habitacion')->references('id_tipo_habitacion')->on('tipo_habitaciones')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('habitaciones');
    }
}
