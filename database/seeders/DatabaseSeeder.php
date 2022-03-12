<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
      $user = User::factory()->times(1)->create([
        'name' => "John",
        'email' => "dev@dev.com",
        'password' => bcrypt("password"),
      ]);



      Project::factory()->times(40)->create();
      Contact::factory(40)->create();
    }
}
