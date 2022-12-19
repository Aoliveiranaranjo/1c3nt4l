<?php

namespace Database\Seeders;

use App\Models\TypeChange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeChangeSeeder extends Seeder
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
                'name' => '10 Ml',

            ],
            [
                'name' => '100  Ml',

            ],
            [
                'name' => '150 Ml',

            ],
            [
                'name' => '250 Ml',

            ],

           ];

           foreach($types as $type){
            TypeChange::create($type);
        }
    }
}
