<?php

namespace Database\Factories;

use App\Models\Charge;
use App\Models\Group;
use App\Models\Sex;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigo'=> $this->faker->numerify(),
            'name' => $this->faker->name(),
            'dni'=> $this->faker->numerify(),
            'antiquity'=> $this->faker->date(),
            'email'=> $this->faker->email(),
         //   'phone'=> $this->faker->phone(),
           // 'emergencyPhone'=> $this->faker->phone(),
            'sex_id'  =>   Sex::inRandomOrder()->first()->id,
            'charge_id'  =>   Charge::inRandomOrder()->first()->id,
            'group_id'  =>   Group::inRandomOrder()->first()->id,      ];
    }
}
