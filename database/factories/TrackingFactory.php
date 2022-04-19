<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'user_id' => 2,
          'customer_id' => Customer::inRandomOrder()->first()->id,
          'building_id' => Building::inRandomOrder()->first()->id,
          'operation_id'=> 1,
          'state_id' => 1,
          'contact_type' => "Directo",
        ];
    }
}
