<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        return [
          'name' => $this->faker->name,
          'last_name' => $this->faker->lastName,
          'second_last_name' => $this->faker->lastName,
          'email' => $this->faker->email,
          'phone' => $this->faker->numerify('(##) ####-####'),
        ];
    }
}
