<?php

namespace Database\Seeders;

use App\Models\Charge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $charges = [
            [
                'name' => 'RESP.MAQUINISTA /CATEG.1ª',

            ],
            [
                'name' => 'RESP.MAQUINISTA /CATEG.2ª',

            ],
            [
                'name' => 'RESP.MAQUINISTA /CATEG.3ª',

            ],
            [
                'name' => 'OPERARIA MAQUINA/CATEG.2ª',

            ],
            [
                'name' => 'OPERARIA MAQUINA/CATEG.4ª',

            ]

        ];
    foreach($charges as $charge){
        Charge::create($charge);
    }
    }
}
