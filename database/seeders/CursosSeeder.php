<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            [
                'curso_id'=> 1,
                'nombre' => 'RCP para niños',
                'descripcion' => 'Damos RCP para niños, es eso nomás.',
                'precio' => 300000,
                'portada' => null,
                'portada_descripcion' => 'Foto de niños haciendo RCP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id'=> 2,
                'nombre' => 'RCP para adultos',
                'descripcion' => 'Damos RCP para adultos, es eso nomás.',
                'precio' => 500000,
                'portada' => null,
                'portada_descripcion' => 'Foto de adultos haciendo RCP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id'=> 3,
                'nombre' => 'desobstrucción para niños',
                'descripcion' => 'Damos desobstrucción para niños, es eso nomás.',
                'precio' => 200000,
                'portada' => null,
                'portada_descripcion' => 'Foto de niños haciendo desobstrucción',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
