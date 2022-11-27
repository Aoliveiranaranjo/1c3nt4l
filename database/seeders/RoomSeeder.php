<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'nameRoom' => 'S/Sala',

            ],
            [
                'nameRoom' => 'ALIM',

            ],
            [
                'nameRoom' => '001A',

            ],
            [
                'nameRoom' => '002A',

            ],
            [
                'nameRoom' => '003A',

            ],[
                'nameRoom' => '004A',

            ],
            [
                'nameRoom' => '005A',

            ],
            [
                'nameRoom' => '006A',

            ],
            [
                'nameRoom' => '001C',

            ],
            [
                'nameRoom' => '002C',

            ],
            [
                'nameRoom' => '003C',

            ],[
                'nameRoom' => '004C',

            ],
            [
                'nameRoom' => '005C',

            ],
            [
                'nameRoom' => '007C',

            ],
            [
                'nameRoom' => '008C',

            ],
            [
                'nameRoom' => '009C',

            ],[
                'nameRoom' => '010C',

            ],
            [
                'nameRoom' => '011C',

            ],
            [
                'nameRoom' => '101C',

            ],
            [
                'nameRoom' => '102C',

            ],
            [
                'nameRoom' => '103C',

            ],
            [
                'nameRoom' => '104C',

            ],[
                'nameRoom' => '105C',

            ],
            [
                'nameRoom' => '106C',

            ],
            [
                'nameRoom' => '107C',

            ],
            [
                'nameRoom' => '108C',

            ],
            [
                'nameRoom' => '109C',

            ],
            [
                'nameRoom' => '1SANI',

            ],
            [
                'nameRoom' => '2SANI',

            ],
            [
                'nameRoom' => '3SANI',

            ],

        ];
    foreach($rooms as $room){
        Room::create($room);
    }
    }
}
