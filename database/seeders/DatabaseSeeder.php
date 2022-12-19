<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(ChargeSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(GroupSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(SexSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(IncidentTypeSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(RoomSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(StateChangeSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(ArticleSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(OrderStateSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(TypeOrderSeeder::class);//Este podemos hacerlo para el inicio
        $this->call(StateProductionSeeder::class); //Este podemos hacerlo para el inicio
        $this->call(TypeChangeSeeder::class);
        $this->call(MechanicSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(DecreaseTypeSeeder::class); //Este podemos hacerlo para el inicio
        $this->call(FaultTypeSeeder::class); //Este podemos hacerlo para el inicio
        $this->call(MachineSeeder::class); //Este podemos hacerlo para el inicio
        $this->call(EmployeeSeeder::class);

        // factorys
      //  $this->call(ArticleSeeder::class);
       // $this->call(OrderSeeder::class);
      //  $this->call(EmployeeSeeder::class);
       // $this->call(ProductionSeeder::class);
    }
}
