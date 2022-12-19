<?php

namespace Database\Seeders;

use App\Models\FaultType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaultTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $FaultTypes = [
            [
                'name' => 'Cabezales etiquetadora',

            ],
            [
                'name' => 'Calentador sleever',

            ],
            [
                'name' => 'Codificador de lote',

            ],
            [
                'name' => 'Control de peso',

            ],
            [
                'name' => 'Detector de metales',

            ],
            [
                'name' => 'En  apertura',

            ],
            [
                'name' => 'En  bombeo',

            ],
            [
                'name' => 'En  corte',

            ],
            [
                'name' => 'En  llenado',

            ],
            [
                'name' => 'En  sellado',

            ],
            [
                'name' => 'En alimentador',

            ],
            [
                'name' => 'En arrastre',

            ],
            [
                'name' => 'En dosificación',

            ],
            [
                'name' => 'En dosificador cápsulas',

            ],
            [
                'name' => 'En toallita ',

            ],
            [
                'name' => 'Enfriador',

            ],
            [
                'name' => 'Estético ',

            ],
            [
                'name' => 'Etiquetado',

            ],
            [
                'name' => 'Expulsión',

            ],
            [
                'name' => 'Fotocélula ',

            ],
            [
                'name' => 'Mecánica  ',

            ],
            [
                'name' => 'Pegado ',

            ],
            [
                'name' => 'Plegado',

            ],
            [
                'name' => 'Posicionador de tapa',

            ],
            [
                'name' => 'Presionador',

            ],
            [
                'name' => 'Roscado/presionador/grafador',

            ],
            [
                'name' => 'Otro',

            ],


        ];
    foreach($FaultTypes as $FaultType){
        FaultType::create($FaultType);
    }
    }
}
