<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class organizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'id' => 1,
            'name' => 'Organizacion de prueba',
            'description' => 'Organizacion para prueba tecnica',
            'active' => 'Y',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
