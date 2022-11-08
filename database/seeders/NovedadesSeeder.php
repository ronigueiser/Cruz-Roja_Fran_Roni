<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('novedades')->insert([
            [
                'novedad_id'=> 1,
                'titulo' => 'Actividad 1',
                'curso_id' => 2,
                'detalle' => 'Detalle de la actividad 1',
            ],
            [
                'novedad_id'=> 2,
                'titulo' => 'Actividad 2',
                'curso_id' => 1,
                'detalle' => 'Detalle de la actividad 1',
            ],
            [
                'novedad_id'=> 3,
                'titulo' => 'Actividad 3',
                'curso_id' => 3,
                'detalle' => 'Detalle de la actividad 1',
            ],
            [
                'novedad_id'=> 4,
                'titulo' => 'Actividad 4',
                'curso_id' => 2,
                'detalle' => 'Detalle de la actividad 1',
            ],
            [
                'novedad_id'=> 5,
                'titulo' => 'Actividad 5',
                'curso_id' => 5,
                'detalle' => 'Detalle de la actividad 1',
            ],
            [
                'novedad_id'=> 6,
                'titulo' => 'Actividad 6',
                'curso_id' => 2,
                'detalle' => 'Detalle de la actividad 1',
            ],
        ]);
    }
}
