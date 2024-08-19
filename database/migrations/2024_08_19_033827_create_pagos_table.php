<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id_pago');
            $table->string('nombre_tarjeta');
            $table->string('num_tarjeta', 16);
            $table->date('fecha_vencimiento');
            $table->unsignedBigInteger('id_reserva');
            $table->timestamps();

            // Clave foránea
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
