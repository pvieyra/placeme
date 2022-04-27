<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        return [
          'building_code' => $this->faker->word . $this->faker->randomNumber(null,false) .$this->faker->word,
          'address' => $this->faker->secondaryAddress,
          'suburb' => $this->faker->text(20),
          'municipality' => $this->faker->state,
          'int_number' => $this->faker->randomNumber(),
          'zip' => $this->faker->postcode,
          'alias' => $this->faker->text(20),
          'comments' => $this->faker->text(150),
          'active' => 1
        ];
    }
}
