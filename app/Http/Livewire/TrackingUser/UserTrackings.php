<?php

namespace App\Http\Livewire\TrackingUser;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserTrackings extends Component{

  use WithPagination;

  public $user;
  protected $trackings;
  protected $perPage = 10;
  protected $trigger =  FALSE;
  protected $listeners = [
    "searchUserTrackings" => "filterUserTrackings",
  ];


  public function render(){
    if(! $this->trigger){
      $this->getUserTrackings();
    }
    return view('livewire.tracking-user.user-trackings',[
      'trackings' => $this->trackings
    ]);
  }

  public function filterUserTrackings(){
    $this->getUserTrackings();
    $this->trigger = TRUE;
  }

  public function getUserTrackings(){
    $this->trackings = DB::table('trackings as t')
      ->selectRaw("t.id as tracking_id, b.building_code, CONCAT(u.name, ' ',a.last_name) as user_name, u.id , u.email, t.customer_id, CONCAT(c.name,' ',c.last_name) as customer_name,  c.phone as customer_phone, b.id as building_id, b.building_code, b.address, s.name as state_name, s.color as state_color, t.created_at as creado")
      ->join("customers as c","t.customer_id",'=','c.id')
      ->join("buildings as b","t.building_id","=","b.id")
      ->join("users as u", "t.user_id","=","u.id")
      ->join("additionals as a","u.id", "=","a.user_id")
      ->join("states as s","t.state_id", "=", "s.id")
      ->where("u.id", "=", $this->user->id)
      ->when( session("search"), function( $q ){
        $q->Where("s.name", "LIKE", '%' . session('search') . '%')
        ->orWhere("c.name", "LIKE", '%' . session('search') . '%')
          ->where("u.id", "=", $this->user->id)
        ->orWhere("c.phone", "LIKE", '%' . session('search') . '%')
          ->where("u.id", "=", $this->user->id);
      })
      ->where("u.id", "=", $this->user->id)
      ->orderBy("t.created_at", "desc")
      ->paginate($this->perPage);
  }

}
