<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table('states')->insert([
        'name' => "Prospecto",
        'hierarchy' => 1,
        'created_at' => Carbon::now(),
      ]);
      DB::table('states')->insert([
        'name' => "1ra Visita",
        'hierarchy' => 2,
        'created_at' => Carbon::now(),
      ]);
      DB::table('states')->insert([
        'name' => "2da Visita",
        'hierarchy' => 3,
        'created_at' => Carbon::now(),
      ]);
      DB::table('states')->insert([
        'name' => "Apartado",
        'hierarchy' => 4,
        'created_at' => Carbon::now(),
      ]);
      DB::table('states')->insert([
        'name' => "Autorizacion de Credito",
        'hierarchy' => 5,
        'created_at' => Carbon::now(),
      ]);
      DB::table('states')->insert([
        'name' => "Firma de contrato",
        'hierarchy' => 6,
        'created_at' => Carbon::now(),
      ]);
      DB::table('states')->insert([
        'name' => "Escrituración",
        'hierarchy' => 7,
        'created_at' => Carbon::now(),
      ]);
      DB::table('states')->insert([
        'name' => "Entregado",
        'hierarchy' => 8,
        'created_at' => Carbon::now(),
      ]);
      DB::table('states')->insert([
        'name' => "No Interesado",
        'hierarchy' => 9,
        'created_at' => Carbon::now(),
      ]);
    }
}
