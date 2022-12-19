<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Groups = [
            [
                'name' => 'Primer Truno',

            ],
            [
                'name' => 'Segundo Turno',

            ]

        ];
    foreach($Groups as $Group){
        Group::create($Group);
    }
    }
}
