<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('admin');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
        });

        DB::table('usuario')->insert([
            'nombre' => 'Rodrigo Abasto',
            'admin' => true,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
