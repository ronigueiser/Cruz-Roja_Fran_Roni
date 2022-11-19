<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClasificacionSeeder::class);
        $this->call(CursosSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(NovedadesSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
