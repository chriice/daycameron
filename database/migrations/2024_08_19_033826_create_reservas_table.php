<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id_reserva');
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->unsignedBigInteger('id_habitacion');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_extra')->nullable();
            $table->decimal('total', 8, 2);
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_habitacion')->references('id_habitacion')->on('habitaciones')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_extra')->references('id_extra')->on('extras')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
