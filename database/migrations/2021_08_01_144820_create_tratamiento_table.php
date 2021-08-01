<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamiento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medicamento');
            $table->string('dosis');
            $table->integer('cantidad_dias');
            $table->string('presentacion');
            $table->unsignedInteger('consulta_id');
            $table->foreign('consulta_id')->references('id')
                ->on('consulta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamiento');
    }
}
