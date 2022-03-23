<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdditionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
          //'user_id' => ,
          'last_name' => $this->faker->lastName,
          'second_lastname' => $this->faker->lastName,
          'phone' => $this->faker->numerify('##########'),
          'photo_profile' => "photo-profile/user_profile_a.png",
          'change_password' => 0
        ];
    }
}
