<?php

namespace App\Exports;

use App\Models\Tracking;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserTrackingsExport implements FromView {
  public function view(): View {
    $active = "";
    if( session('active_tracking') == "a"){
      $active = 1;
    }else{
      $active = 0;
    }
    //tracking logic
    $trackings =  Tracking::join('users', 'trackings.user_id', '=', 'users.id')
      ->join('customers', 'trackings.customer_id', '=', 'customers.id')
      ->join('buildings', 'trackings.building_id', '=', 'buildings.id')
      ->join('states', 'trackings.state_id', '=', 'states.id')
      ->join('operations', 'trackings.operation_id', '=', 'operations.id')
      ->join('additionals', 'additionals.id', '=', 'users.id')
      ->where('trackings.user_id', '=', session('account_user'))
     /* ->when(session('account_user'), function($query){
        $query->where('trackings.user_id', '=', session('account_user'));
      })*/
      ->when(session('active_tracking'), function($query) use($active){
        $query->where('trackings.active','=' , $active);
      })
      ->when((session('start_date') && is_null( session('end_date') )) ,function($query){
        $query->whereDate('trackings.created_at', session('start_date'));
      })
      ->when(session('start_date') && session('end_date')  ,function($query) {
        return $query->whereBetween('trackings.created_at', [ session('start_date'), session('end_date')]);
      })
      ->when(session('state_tracking'), function($query){
        $query->where('states.id','=' , session('state_tracking'));
      })
      ->when(session('operation_tracking'), function($query){
        $query->where('operations.id','=' , session('operation_tracking'));
      })
      ->select('trackings.id','users.email',
        DB::raw('CONCAT( users.name , " ", additionals.last_name) as user_name'),
        DB::raw('CONCAT(customers.name, " ", customers.last_name) as cliente'), 'customers.phone',
        'buildings.address', 'trackings.contact_type',
        DB::raw('CONCAT(buildings.address, " ", buildings.suburb) as direccion'),
        'states.color as color','states.name as estado',
        DB::raw('trackings.created_at as creado'),'trackings.active as activo',
        'trackings.updated_at as actualizado', 'operations.name as operation_name', 'operations.id as operation_id')
      ->orderBy('trackings.created_at', 'desc')->get();
    /*->paginate(10);*/
    return view('exports.user-trackings', compact('trackings'));
  }
}
