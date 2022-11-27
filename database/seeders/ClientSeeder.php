<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'name' => 'ANTONIO PUIG, S.A',
                'abbreviated' => 'PUIG',

            ],
            [
                'name' => 'PRODUCTOS CAPILARES LOREAL, S.A.',
                'abbreviated' => 'LOREAL',
            ],
        ];
    foreach($clients as $client){
        Client::create($client);
    }
    }
}
