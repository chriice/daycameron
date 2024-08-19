<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->bigIncrements('id_invitados');
            $table->string('nombres');
            $table->string('apellidos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitados');
    }
}
