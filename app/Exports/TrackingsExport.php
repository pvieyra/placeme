<?php

namespace App\Exports;

use App\Models\Tracking;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class TrackingsExport implements FromView {
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
      /*   ->where('trackings.user_id', '=', auth()->user()->id )*/
      /* ->when($customerName, function($query) use($customerName){
         $query->where('customers.name','like' , '%'. $customerName .'%')
           ->orWhere('customers.last_name', 'like', '%'. $customerName .'%');
       })
       ->when($buildingAddress, function($query) use($buildingAddress){
         $query->where('buildings.address','like' , '%'.$buildingAddress.'%');
       })
       ->where('buildings.suburb','like' , '%'.$buildingSuburb.'%')
       ->when($startDate && $endDate  ,function($query) use($startDate, $endDate){
         return $query->whereBetween('trackings.created_at', [ $startDate, $endDate]);
       })
       ->when(($startDate && is_null($endDate)) ,function($query) use($startDate){
         $query->whereDate('trackings.created_at', [ $startDate]);
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

      /*->when(session('active_tracking'), function($query){
        $query->where('activo','=' , session('active_tracking'));
      })
      ->where('trackings.active', '=', 0)*/
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
    return view('exports.trackings', compact('trackings'));
  }
}
