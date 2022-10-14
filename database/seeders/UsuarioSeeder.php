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
               'password' => \Hash::make('asdasd'),
               'created_at' => now(),
               'updated_at' => now()
           ],
        ]);
    }
}
