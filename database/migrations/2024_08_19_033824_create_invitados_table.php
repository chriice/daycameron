<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->bigIncrements('id_invitados');  // Esto asegura que el campo sea auto_increment y clave primaria
            $table->string('nombre');
            $table->integer('edad');
            $table->string('telefono')->nullable();
            $table->string('dui')->nullable();
            $table->timestamps();
        });
        
        
    }

    public function down()
    {
        Schema::dropIfExists('invitados');
    }
}
