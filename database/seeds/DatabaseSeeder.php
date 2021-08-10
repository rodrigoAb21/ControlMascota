<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mascota')->insert([
            'nombre' => 'Don Gato',
            'fecha_nac' => null,
            'tipo' => 'Felino',
            'sexo' => 'M',
        ]);

        DB::table('mascota')->insert([
            'nombre' => 'Minina',
            'fecha_nac' => null,
            'tipo' => 'Felino',
            'sexo' => 'H',
        ]);

        DB::table('mascota')->insert([
            'nombre' => 'Nora 1',
            'fecha_nac' => null,
            'tipo' => 'Felino',
            'sexo' => 'H',
        ]);

        DB::table('mascota')->insert([
            'nombre' => 'Nora 2',
            'fecha_nac' => null,
            'tipo' => 'Felino',
            'sexo' => 'H',
        ]);

        DB::table('mascota')->insert([
            'nombre' => 'Beethoven',
            'fecha_nac' => null,
            'tipo' => 'Felino',
            'sexo' => 'M',
        ]);

        DB::table('mascota')->insert([
            'nombre' => 'Surubi',
            'fecha_nac' => '2021-01-01',
            'tipo' => 'Felino',
            'sexo' => 'M',
        ]);

        DB::table('mascota')->insert([
            'nombre' => 'Janucho',
            'fecha_nac' => '2021-01-01',
            'tipo' => 'Felino',
            'sexo' => 'M',
        ]);
    }
}
