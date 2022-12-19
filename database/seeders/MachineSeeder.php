<?php

namespace Database\Seeders;

use App\Models\Machine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $machines = [
            [
                'codMachine' => 'S/maquína',
                'name' => 'S/maquína',
                'abbreviated' => 'SIN/MAQ',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '1',

            ],
            [
                'codMachine' => '120',
                'name' => 'BOSSAR 2500 L',
                'abbreviated' => 'SIN/MAQ',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '3',

            ],
            [
                'codMachine' => '102',
                'name' => 'CELOFANADORA.CE HORIZ',
                'abbreviated' => 'CELO',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '4',

            ],
            [
                'codMachine' => '124',
                'name' => 'BOSSAR 1600 L',
                'abbreviated' => 'BOSSAR',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '5',

            ],
            [
                'codMachine' => '123',
                'name' => 'BOSSAR 1600 LS',
                'abbreviated' => 'BOSSAR',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '6',

            ],
            [
                'codMachine' => '100',
                'name' => 'BOSSAR 1600 L',
                'abbreviated' => 'BOSSAR',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '7',

            ],
            [
                'codMachine' => '137',
                'name' => 'BETA 360 4P VERTICAL',
                'abbreviated' => '4P VERTICAL',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '8',

            ],
            [
                'codMachine' => '121',
                'name' => 'HORNO RETRACTILADO',
                'abbreviated' => 'HORNO',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '2',

            ],
            [
                'codMachine' => '128',
                'name' => 'ROVEMA S.90 ',
                'abbreviated' => 'ROVEMA',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '2',

            ],
            [
                'codMachine' => '132',
                'name' => 'COALZA',
                'abbreviated' => 'COALZA',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '2',

            ],
            [
                'codMachine' => '127',
                'name' => 'LOTEADORA HAPA',
                'abbreviated' => 'HAPA',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '2',

            ],
            [
                'codMachine' => '133',
                'name' => 'FRASCOS AV 2019',
                'abbreviated' => 'FRASCOS',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '9',

            ],
            [
                'codMachine' => '136',
                'name' => 'ETIQUETADORA EIMATEC 2015',
                'abbreviated' => 'ETI. EIMATEC 2015',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '9',

            ],
            [
                'codMachine' => '104',
                'name' => 'BETA200 LT ',
                'abbreviated' => '2P VERT.',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '10',

            ],
            [
                'codMachine' => '112',
                'name' => 'FRASCOS AV 4B',
                'abbreviated' => 'FRASCOS SHU',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '11',

            ],
            [
                'codMachine' => '117',
                'name' => 'BETA360 LT',
                'abbreviated' => '4P VERT.',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '12',

            ],
            [
                'codMachine' => '103',
                'name' => 'EASYSNAP',
                'abbreviated' => 'EASYSNAP',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '13',

            ],
            [
                'codMachine' => '108',
                'name' => 'BOSSAR 1600 L',
                'abbreviated' => 'BOSSAR',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '17',

            ],
            [
                'codMachine' => '126',
                'name' => 'ETIQUETADORA EIMATEC 2021',
                'abbreviated' => 'ETI. EIMATEC 2021',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '17',

            ],
            [
                'codMachine' => '122',
                'name' => 'FRASCOS AV 4B',
                'abbreviated' => 'FRASCOS',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '15',

            ],
            [
                'codMachine' => '125',
                'name' => 'BETA 360 LT',
                'abbreviated' => '4P VERT.',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '18',

            ],
            [
                'codMachine' => '000',
                'name' => 'ESTUCHADORA',
                'abbreviated' => 'ESTUCHADORA',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '19',

            ],
            [
                'codMachine' => '107',
                'name' => 'NORDENMATIC',
                'abbreviated' => 'TUBOS-NORDE',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '19',

            ],
            [
                'codMachine' => '0000',
                'name' => 'ETIQUETADORA RODILLOS HORIZONTAL',
                'abbreviated' => 'ETI. RODILLO',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '9',

            ],
            [
                'codMachine' => '0000',
                'name' => 'RETRACTILADO SLEEVER',
                'abbreviated' => 'SLEEVER',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '9',

            ],
            [
                'codMachine' => '101',
                'name' => 'BOSSAR 1600 LT',
                'abbreviated' => 'BOSSAR',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '20',

            ],
            [
                'codMachine' => '111',
                'name' => 'AVANZADAS CORTA CE',
                'abbreviated' => 'AVANZ CORTA',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '20',

            ],
            [
                'codMachine' => '131',
                'name' => 'AVANZADAS MINIATURAS PREST.',
                'abbreviated' => 'AVANZ MINI',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '21',

            ],
            [
                'codMachine' => '119',
                'name' => 'B1600 DOYPACK',
                'abbreviated' => 'DOYPACK',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '22',

            ],
            [
                'codMachine' => '118',
                'name' => 'PKB VIALES 1.5ML',
                'abbreviated' => 'PKB',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '23',
            ],
            [
                'codMachine' => '130',
                'name' => 'BELCA FLOWPACK',
                'abbreviated' => 'FLOWPACK',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '23',
            ],
            [
                'codMachine' => '129',
                'name' => 'KALIX CARTONER',
                'abbreviated' => 'KALIX',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '23',
            ],
            [
                'codMachine' => '114',
                'name' => 'TARRINAS KAV',
                'abbreviated' => 'TARRINAS',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '24',

            ],
            [
                'codMachine' => '114',
                'name' => 'ETIQUETADORA VERTICAL KAV',
                'abbreviated' => 'ETI. TARRINA',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '20',
            ],
            [
                'codMachine' => '110',
                'name' => 'FRASCOS AV4B',
                'abbreviated' => 'FRASCOS',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '25',
            ],
            [
                'codMachine' => '135',
                'name' => 'FRASCOS AV 2017 4B',
                'abbreviated' => 'FRASCOS',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '26',

            ],
            [
                'codMachine' => '134',
                'name' => 'ETIQUETADORA EIMATEC 2018',
                'abbreviated' => 'ETI. EIMATEC 2018',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '26',

            ],
            [
                'codMachine' => '122',
                'name' => 'FRASCOS AV 2020',
                'abbreviated' => 'FRASCOS',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '27',

            ],
            [
                'codMachine' => '139',
                'name' => 'LINEA ENVASADO NUTRIS',
                'abbreviated' => 'NUTRIS',
                'cadence' => '0',
                'status' => '1',
                'room_id' => '28',
            ],

        ];
    foreach($machines as $machine){
        Machine::create($machine);
    }
    }
}
