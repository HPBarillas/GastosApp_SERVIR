<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class stateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $GuatemalaStates = array("Alta Verapaz","Baja Verapaz","Chimaltenago","Chiquimula","Guatemala","El Progreso","Escuintla","Huehuetenango","Izabal","Jalapa","Jutiapa","Petén","Quetzaltenango","Quiché","Retalhuleu","Sacatepequez","San Marcos","Santa Rosa","Sololá","Suchitepequez","Totonicapán","Zacapa");

        foreach ($GuatemalaStates as $state) {
            DB::table('state')->insert([
                'countryId' => 1,
                'state' => $state,
                'active' => 'Y',
                'created_at' => now(),
                'updated_at' => now()
           ]);
        }
    }
}
