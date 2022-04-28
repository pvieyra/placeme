<?php

namespace App\Http\Livewire\Trackings;

use App\Models\Customer;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Duplicate extends Component{
  use WithPagination;


  public function render(){
    return view('livewire.trackings.duplicate');
  }

  public function getTrackingsProperty(){
   /* return Tracking::join('users', 'trackings.user_id', '=', 'users.id')
      ->join('additionals','additionals.user_id','=', 'users.id')
      ->join('customers', 'trackings.customer_id', '=', 'customers.id')
      ->join('buildings', 'trackings.building_id', '=', 'buildings.id')
      ->join('states', 'trackings.state_id', '=', 'states.id')
      ->select('trackings.id',
        DB::raw('CONCAT(users.name, " ", additionals.last_name) as asesor'),
        DB::raw('CONCAT(customers.name, " ", customers.last_name) as cliente'),
        'buildings.address','customers.phone as customer_phone',
        DB::raw('CONCAT(buildings.address, " ", buildings.suburb) as direccion'),
        'states.color as color','states.name as estado','trackings.created_at')
      ->where('trackings.active','=', 1)
      ->groupBy('customer_phone')
      ->paginate(10);*/

  }
}
