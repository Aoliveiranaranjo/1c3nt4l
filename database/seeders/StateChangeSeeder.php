<?php

namespace Database\Seeders;

use App\Models\StateChange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [
                'name' => 'Anulado',

            ],
            [
                'name' => 'Nuevo',

            ],
            [
                'name' => 'Mecanico asignado',

            ],
            [
                'name' => 'En Proceso',

            ],
            [
                'name' => 'Cambio Terminado',

            ],

           ];

           foreach($states as $state){
            StateChange::create($state);
        }
    }
}
