<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'CodeCentral' => $this->faker->numerify(),
            'name' => $this->faker->name(),
            'CodeClient' => $this->faker->numerify(),
            'status' => $this->faker->randomElement(['1', '0']),
            'statusArticle' => $this->faker->randomElement(['NUEVO', 'AUTORIZADO','DEROGADO',
            'PENDIENTE', 'REPETICION', 'RECHAZADO', 'SUSPENDIDO', ]),
            'customer_id' => Customer::inRandomOrder()->first()->id
        ];
    }
}
