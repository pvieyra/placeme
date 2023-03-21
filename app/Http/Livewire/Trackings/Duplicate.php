<?php

namespace App\Http\Livewire\Trackings;

use App\Models\Customer;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Matrix\Exception;

class Duplicate extends Component{
  use WithPagination;
  public $userEmail;
  public $buildingCode;
  public $building_id;
  public $tracking;
  public $duplicates;
  public $view = 'search-duplicate';

  protected $_trackings;
  protected $callTrackings = false;

  protected $listeners = ['searchingTrackings' => 'filteredTrackings'];

  public function filteredTrackings($tracking_id) {
    $this->view = 'show-duplicates';
    $this->tracking = Tracking::findOrFail($tracking_id,["id","building_id"]);
    $this->_trackings =  $this->getDuplicates($this->tracking->building_id);
    $this->callTrackings = true;
  }

  public function demo($trackingId){
    $this->view = 'show-duplicates';
    $this->tracking = Tracking::findOrFail($trackingId,["id","building_id"]);
    $this->_trackings = $this->getDuplicates($this->tracking->building_id);
    //$this->_trackings = $this->tracking->building_id;
  }

  public function render(){
    return view('livewire.trackings.duplicate',[
      'trackingsDuplicates' => $this->_trackings
    ]);
  }

  public function getTrackingsProperty(){
    return DB::table('trackings as t')
      ->selectRaw("t.id as tracking_id,b.building_code, CONCAT(u.name, ' ',a.last_name) as user_name, u.email, t.customer_id, CONCAT(c.name,' ',c.last_name) as customer_name,  c.phone as customer_phone, b.id as building_id, b.building_code, b.address, s.name as state_name, s.color as state_color, t.created_at as creado")
      ->join("customers as c","t.customer_id",'=','c.id')
      ->join("buildings as b","t.building_id","=","b.id")
      ->join("users as u", "t.user_id","=","u.id")
      ->join("additionals as a","u.id", "=","a.user_id")
      ->join("states as s","t.state_id", "=", "s.id")
      ->whereRaw("c.phone IN (
	        SELECT c.phone FROM trackings as t
            JOIN customers as c
            ON t.customer_id = c.id
            GROUP BY  c.phone
            HAVING COUNT(*) > 1
            ORDER BY c.phone
     ) ")
      /*->whereRaw("t.building_id IN(
          SELECT trackings.building_id FROM trackings
        GROUP BY trackings.building_id
        HAVING COUNT(*) > 1
      ) ")*/
      ->where("t.active","=",1)
      ->where("t.checked","=", 0)
      ->when($this->userEmail, function($query){
        return $query->where('u.email','like',"%{$this->userEmail}%");
      })
      ->when($this->buildingCode, function($query){
        return $query->where('b.building_code','like',"%{$this->buildingCode}%");
      })
      ->paginate(10);
  }

  public function default(){
    $this->reset();
    $this->view = 'search-duplicate';
  }

  public function show($tracking_id){
    $this->view = 'show-duplicates';
    $this->tracking = Tracking::findOrFail($tracking_id,["id","building_id"]);
    //Post::findOrFail($id,[“id”, “title”]);
  }

  protected function getDuplicates($building_id){
   return DB::table('trackings as t')
      ->selectRaw("t.id as tracking_id,b.building_code, CONCAT(u.name, ' ',a.last_name) as user_name, u.email, t.customer_id, CONCAT(c.name,' ',c.last_name) as customer_name,  c.phone as customer_phone, b.id as building_id, b.building_code, b.address, s.name as state_name, s.color as state_color, t.active as activo, t.checked as revisado, t.created_at as creado")
      ->join("customers as c","t.customer_id",'=','c.id')
      ->join("buildings as b","t.building_id","=","b.id")
      ->join("users as u", "t.user_id","=","u.id")
      ->join("additionals as a","u.id", "=","a.user_id")
      ->join("states as s","t.state_id", "=", "s.id")
      ->whereRaw("c.phone IN (
	        SELECT c.phone FROM trackings as t
            JOIN customers as c
            ON t.customer_id = c.id
            GROUP BY  c.phone
            HAVING COUNT(*) > 1
     ) ")
      /*->whereRaw("t.building_id IN(
          SELECT trackings.building_id FROM trackings
        GROUP BY trackings.building_id
        HAVING COUNT(*) > 1
      ) ")*/
      ->where('building_id',"=", $building_id)->get();
  }

  public function toggleActive($trackingID, $state){
    if($state){
      $active = 0;
      $check = 1;
    } else {
      $active = 1;
      $check = 0;
    }
    try{
      $tracking = Tracking::findOrFail($trackingID);
      $tracking->timestamps = false;
      $tracking->active = $active;
      $tracking->checked = $check;
      $tracking->save();
      $this->demo($tracking->id);
    }catch (Exception $exception){
      return $exception->getMessage();
    }
  }
  public function toggleCheck($trackingID, $state){
    $active = $state ? 0 : 1;
    try{
      $tracking = Tracking::findOrFail($trackingID);
      $tracking->timestamps = false;
      $tracking->checked = $active;
      $tracking->save();
      $this->demo($tracking->id);
    }catch (Exception $exception){
      return $exception->getMessage();
    }
  }

}
