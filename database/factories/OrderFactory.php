<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\OrderState;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'pedido' => $this->faker->numerify(),
            'pedidoCliente' => $this->faker->numerify(),
            'orden' => $this->faker->numerify(),
            'amount' => $this->faker->numerify(),
            'orderstate_id'=> OrderState::inRandomOrder()->first()->id,
            'article_id'=> Article::inRandomOrder()->first()->id,
            'dateDelivery' => Carbon::today()->subDays(rand(0, 365))



        ];
    }
}
