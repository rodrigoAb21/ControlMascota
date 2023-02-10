<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veterinaria')->insert([
            'nombre' => 'Brito',
            'direccion' => 'Km 6 Interseccion de calle Selva y Bajío',
            'telefono' => '33532021',
            'celular' => '73194476',
            'atencion' => '24hrs',
        ]);

        DB::table('mascota')->insert([
            'nombre' => 'Chimuelito',
            'fecha_nac' => '2019-01-02',
            'tipo' => 'Felino',
            'sexo' => 'Macho',
            'raza' => 'Mestizo',
            'color' => 'Atigrado',
        ]);
    }
}
