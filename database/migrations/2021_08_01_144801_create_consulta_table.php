<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_consulta');
            $table->text('sintomas');
            $table->text('diagnostico')->nullable();
            $table->date('fecha_control')->nullable();
            $table->unsignedInteger('mascota_id');
            $table->foreign('mascota_id')->references('id')
                ->on('mascota')->onDelete('cascade');
            $table->unsignedInteger('veterinaria_id');
            $table->foreign('veterinaria_id')->references('id')
                ->on('veterinaria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulta');
    }
}
