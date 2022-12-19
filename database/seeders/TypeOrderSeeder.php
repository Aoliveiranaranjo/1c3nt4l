<?php

namespace Database\Seeders;

use App\Models\TypeOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'LLenado',

            ],
            [
                'name' => 'Etiquetado',

            ],
            [
                'name' => 'Loteado',

            ],
            [
                'name' => 'Manipulado',

            ],
            [
                'name' => 'Final',

            ],

           ];


           foreach($types as $type){
            TypeOrder::create($type);
        }
    }
}
