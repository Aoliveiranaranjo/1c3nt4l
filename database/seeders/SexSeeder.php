<?php

namespace Database\Seeders;

use App\Models\Sex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Sexes = [
            [
                'name' => 'M',

            ],
            [
                'name' => 'F',

            ],
            [
                'name' => 'O',

            ]

        ];
    foreach($Sexes as $sex){
        Sex::create($sex);
    }
    }
}
