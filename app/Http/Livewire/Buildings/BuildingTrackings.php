<?php

namespace App\Http\Livewire\Buildings;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class BuildingTrackings extends Component {
  use WithPagination;

  public $building;
  public $isTrackingActive;
  protected $trackings;
  protected $perPage = 10;
  protected $trigger = FALSE;

  protected $listeners = [
    "searchBuildingTrackings" => "filterBuildingTrackings",
  ];


  public function render(){
    if(! $this->trigger ){
      $this->getBuildingTrackings();
    }
    return view('livewire.buildings.building-trackings', [
      "trackings" => $this->trackings,
    ]);
  }

  public function filterBuildingTrackings(){
    $this->getBuildingTrackings();
    $this->trigger = TRUE;
  }

  public function getBuildingTrackings(){
    $this->trackings = DB::table('trackings as t')
      ->selectRaw("t.id as tracking_id, b.building_code, CONCAT(u.name, ' ',a.last_name) as user_name, u.id , u.email as user_email, t.customer_id, CONCAT(c.name,' ',c.last_name) as customer_name,  c.phone as customer_phone, b.id as building_id, b.building_code, b.address, s.name as state_name, s.color as state_color, t.active as active, t.created_at as creado")
      ->join("customers as c","t.customer_id",'=','c.id')
      ->join("buildings as b","t.building_id","=","b.id")
      ->join("users as u", "t.user_id","=","u.id")
      ->join("additionals as a","u.id", "=","a.user_id")
      ->join("states as s","t.state_id", "=", "s.id")
      ->where("b.id", "=", $this->building->id)
      ->when( session("search-building"), function( $q ){
        $q->Where("s.name", "LIKE", '%' . session("search-building") . '%')
          ->orWhere("c.name", "LIKE", '%' . session("search-building") . '%')
          ->where("b.id", "=", $this->building->id)
          ->orWhere("c.phone", "LIKE", '%' . session("search-building") . '%')
          ->where("b.id", "=", $this->building->id)
          ->orWhere("u.name", "LIKE", '%' . session("search-building") . '%')
          ->where("b.id", "=", $this->building->id)
          ->orWhere("u.email", "LIKE", '%' . session("search-building") . '%')
          ->where("b.id", "=", $this->building->id);
      })
      ->orderBy("t.created_at", "desc")
      ->paginate($this->perPage);
  }
}
