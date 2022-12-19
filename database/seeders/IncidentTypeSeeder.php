<?php

namespace Database\Seeders;

use App\Models\IncidentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incidenstypes = [
            [
                'name' => 'Avería leve',

            ],
            [
                'name' => 'Calidad',

            ],
            [
                'name' => 'Producción',

            ],[
                'name' => 'Inicio',

            ],
            [
                'name' => 'Parada-Bocadillo',

            ],
            [
                'name' => 'Parada-Documentación',

            ],
            [
                'name' => 'Parada-Planificación',

            ],
            [
                'name' => 'Otros',

            ],

        ];
    foreach($incidenstypes as $incidenstype){
        IncidentType::create($incidenstype);
    }
    }
}
