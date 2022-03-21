<?php

namespace Database\Factories;

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
          'user_id' => 2,
          'last_name' => 'Vega',
          'second_lastname' => "Thompson",
          'phone' => '3318548115',
          'photo_profile' => 'user.png',
          'change_password' => 0
        ];
    }
}
