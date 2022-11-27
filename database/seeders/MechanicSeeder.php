<?php

namespace Database\Seeders;

use App\Models\Mechanic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mechanics = [
            [
                'name' => 'S/mecánico',
                'email' => 'email@email.com',
                'abbreviated' => 'NO',

            ],
            [
                'name' => 'ANGEL MOLPECERES GUERRA',
                'email' => 'email1@email.com',
                'abbreviated' => 'ANGEL MOLPECERES',
            ],
            [
                'name' => 'ANTONIO GONZALEZ SANTOS',
                'email' => 'email2@email.com',
                'abbreviated' => 'ANTONIO GONZALEZ',
            ],
            [
                'name' => 'DAVID MARIN SANCHEZ',
                'email' => 'email3@email.com',
                'abbreviated' => 'DAVID MARIN',
            ],

            [
                'name' => 'ENRIQUE MARTINEZ LOPEZ',
                'email' => 'email4@email.com',
                'abbreviated' => 'ENRIQUE MARTINEZ',
            ],
            [
                'name' => 'FERNANDO GIJON SANCHEZ',
                'email' => 'email5@email.com',
                'abbreviated' => 'FERNANDO GIJON',
            ],
            [
                'name' => 'LUIS ANGEL NUEVO REDONDO',
                'email' => 'email6@email.com',
                'abbreviated' => 'LUIS A. NUEVO',
            ],
            [
                'name' => 'MICHAL MIECZNIKOWSKI',
                'email' => 'email7@email.com',
                'abbreviated' => 'MICHAL MIECZNIKOWSKI',
            ],

            [
                'name' => 'MIGUEL ANGEL GONZALEZ REVILLA',
                'email' => 'email8@email.com',
                'abbreviated' => 'MIGUEL GONZALEZ',
            ],
            [
                'name' => 'RAUL SANTANA GOMEZ',
                'email' => 'email9@email.com',
                'abbreviated' => 'RAUL SANTANA',
            ],
            [
                'name' => 'JUAN JOSE RODRIGUEZ GARCIA',
                'email' => 'email10@email.com',
                'abbreviated' => 'JUAN RODRIGUEZ ',
            ],


        ];
    foreach($mechanics as $mechanic){
        Mechanic::create($mechanic);
    }
    }
}
