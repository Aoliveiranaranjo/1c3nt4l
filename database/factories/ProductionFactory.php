<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\Order;
use App\Models\StateProduction;
use App\Models\TypeOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Production>
 */
class ProductionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'typeorder_id' => TypeOrder::inRandomOrder()->first()->id,
            'order_id' => Order::inRandomOrder()->first()->id,
            'state_production_id' => StateProduction::inRandomOrder()->first()->id,
            'machine_id' => Machine::inRandomOrder()->first()->id,
        ];
    }
}
