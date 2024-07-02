<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
