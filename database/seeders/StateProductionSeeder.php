<?php

namespace Database\Seeders;

use App\Models\StateProduction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stateproductions = [
            [
                'name' => 'Nueva',

            ],
            [
                'name' => 'Cambio',

            ],
            [
                'name' => 'En Producción',

            ],
            [
                'name' => 'Parada',

            ],
            [
                'name' => 'Por cierre',

            ],
            [
                'name' => 'Terminada',

            ],


           ];

           foreach($stateproductions as $stateproduction){
            StateProduction::create($stateproduction);
        }
    }
}
