<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      DB::table('operations')->insert([
        'name' => "Venta",
        'created_at' => Carbon::now(),
      ]);
      DB::table('operations')->insert([
        'name' => "Renta",
        'created_at' => Carbon::now(),
      ]);
      DB::table('operations')->insert([
        'name' => "Enlistamiento",
        'created_at' => Carbon::now(),
      ]);
    }
}
