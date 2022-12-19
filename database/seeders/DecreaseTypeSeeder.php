<?php

namespace Database\Seeders;

use App\Models\DecreaseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DecreaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $decreaseTypes = [
            [
                'name' => 'BOMBA',

            ],
            [
                'name' => 'CAJA',

            ],
            [
                'name' => 'COMPLEJO',

            ],
            [
                'name' => 'ESTUCHE',

            ],
            [
                'name' => 'ETIQUETA',

            ],
            [
                'name' => 'FORMATO',

            ],
            [
                'name' => 'FRASCO',

            ],
            [
                'name' => 'JUGO',

            ],
            [
                'name' => 'SOLIDO',

            ],

           ];

           foreach($decreaseTypes as $decreaseType){
            DecreaseType::create($decreaseType);
        }
    }
}
