<?php

namespace App\Http\Livewire\Trackings;

use App\Models\Tracking;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Matrix\Exception;

class ShowDuplicateTracking extends Component{

  public $trackings;

  public $show = FALSE;

  protected $listeners = [
    'showTrackingDuplicate' => 'showTrackings',
    'hideShowDuplicateTracking' => 'hide',
    'showShowDuplicateTracking' => 'show',
  ];

  public function render(){
    return view('livewire.trackings.show-duplicate-tracking',[
      'trackingsDuplicates' => $this->trackings
    ]);
  }

  public function hideAll(){
    $this->emit('hideAllDuplicates');
    $this->emit('hideSearchDuplicates');
  }

  public function hide(){
    $this->show = FALSE;
  }
  public function show(){
    $this->show = TRUE;
  }

  public function back(){
    $this->emit('showSearchDuplicates');
    $this->emit('showAllDuplicates');
    $this->hide();
  }

  public function showTrackings($buildingID ){
    $this->trackings = $this->getDuplicates($buildingID);
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
      $this->showTrackings($tracking->building_id );
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
      $this->showTrackings($tracking->building_id );
    }catch (Exception $exception){
      return $exception->getMessage();
    }
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
      ->whereRaw("t.building_id IN(
          SELECT trackings.building_id FROM trackings
        GROUP BY trackings.building_id
        HAVING COUNT(*) > 1
      ) ")
      ->where('building_id',"=", $building_id)->get();
  }
}
