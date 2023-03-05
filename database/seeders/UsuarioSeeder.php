<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'usuario_id' => 1,
                'email' => 'roni@davinci.edu.ar',
                'password' => \Hash::make('1234'),
                'username' => 'Roni',
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'usuario_id' => 2,
                'email' => 'fran@davinci.edu.ar',
                'password' => \Hash::make('1234'),
                'username' => 'Francisco',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
