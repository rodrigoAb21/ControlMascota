<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->date('fecha_desparasitacion');
            $table->float('peso')->nullable();
            $table->date('proxima_desparasitacion')->nullable();

            $table->unsignedBigInteger('mascota_id');
            $table->foreign('mascota_id')->references('id')
                ->on('mascota')->onDelete('cascade');

            $table->unsignedBigInteger('veterinaria_id');
            $table->foreign('veterinaria_id')->references('id')
                ->on('veterinaria')->onDelete('cascade');


            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')
                ->on('usuario')->onDelete('cascade');
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
