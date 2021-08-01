<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesparasitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desparasitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->date('fecha_vacuna');
            $table->date('fecha_validez')->nullable();
            $table->unsignedInteger('mascota_id');
            $table->foreign('mascota_id')->references('id')
                ->on('mascota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desparasitacion');
    }
}
