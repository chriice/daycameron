<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtrasTable extends Migration
{
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->bigIncrements('id_extra');
            $table->string('nombre');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extras');
    }
}
