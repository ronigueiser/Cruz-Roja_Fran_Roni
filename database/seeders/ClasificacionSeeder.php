<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificaciones')->insert([
            [
                'clasificacion_id' => 1,
                'nombre' => 'Apta Para Todo Público',
                'abreviatura' => 'ATP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clasificacion_id' => 2,
                'nombre' => 'Solo Para Mayores De 18 Años',
                'abreviatura' => 'M18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
