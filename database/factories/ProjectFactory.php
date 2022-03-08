<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory {


  protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array
     *
     * Se regresa un array con la informacion del factory.
     */
    public function definition() {
        return [
          'name' => $this->faker->company,
          'description' => $this->faker->paragraph(3),
          'user_id' => User::all()->random()->id,
          'created_at' => now(),
        ];
    }
}
