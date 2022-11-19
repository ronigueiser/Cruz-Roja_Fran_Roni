<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_id' => 1,
                'nombre' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role_id' => 2,
                'nombre' => 'basic',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
