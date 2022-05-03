<?php

namespace App\Exports;

use App\Models\Tracking;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery {

  use Exportable;

  public function query(){
    return Tracking::join('users', 'trackings.user_id', '=', 'users.id')
      ->join('customers', 'trackings.customer_id', '=', 'customers.id')
      ->join('buildings', 'trackings.building_id', '=', 'buildings.id')
      ->join('states', 'trackings.state_id', '=', 'states.id')
      ->select('trackings.id','users.email as user_email',
        DB::raw('CONCAT(customers.name, " ", customers.last_name) as cliente'),
        'buildings.address',
        DB::raw('CONCAT(buildings.address, " ", buildings.suburb) as direccion'),
        'states.color as color','states.name as estado',
        DB::raw('trackings.created_at as creado'),'trackings.updated_at as actualizado')
      ->orderBy('trackings.created_at', 'desc');
  }
}
