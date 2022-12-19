<?php

namespace Database\Seeders;

use App\Models\OrderState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStateSeeder extends Seeder
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
                'name' => 'Anulada',

            ],
            [
                'name' => 'Lanzada',

            ],
            [
                'name' => 'En curso',

            ],
            [
                'name' => 'Paralizada',

            ],
            [
                'name' => 'Terminada',

            ],

           ];

           foreach($states as $state){
            OrderState::create($state);
        }
    }
}
