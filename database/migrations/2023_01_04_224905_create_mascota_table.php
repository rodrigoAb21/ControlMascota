<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->date('fecha_nac')->nullable();
            $table->string('tipo');
            $table->string('sexo');
            $table->string('color')->nullable();
            $table->string('raza')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascota');
    }
}
