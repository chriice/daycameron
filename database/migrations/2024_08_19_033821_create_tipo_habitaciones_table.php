<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoHabitacionesTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_habitaciones', function (Blueprint $table) {
            $table->bigIncrements('id_tipo_habitacion');
            $table->string('nombre');
            $table->integer('capacidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_habitaciones');
    }
}

