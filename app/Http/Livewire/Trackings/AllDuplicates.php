<?php

namespace App\Http\Livewire\Trackings;

use App\Models\Tracking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AllDuplicates extends Component{
  use WithPagination;

  public $show = TRUE;
  protected $trackings;
  protected $perPage = 10;
  protected $trigger = FALSE;


  protected $listeners = [
    'searchDuplicatesTrackings' => 'filterTrackings',
    'searchDuplicatesTrackingsA' => 'filterTrackingsA',
    'hideAllDuplicates' => 'hideDuplicates',
    'showAllDuplicates' => 'showDuplicates',
  ];

  public function render(){
    if(!$this->trigger){
      $this->getDuplicatesTrackings();
    }
    return view('livewire.trackings.all-duplicates', [
      'trackings' => $this->trackings
    ]);
  }

  public function hideDuplicates(){
    $this->show = FALSE;
  }
  public function showDuplicates(){
    $this->show = TRUE;
    //ocultar showTrackingDuplicate
  }

  public function filterTrackings(){
    $this->getDuplicatesTrackings();
    $this->trigger = true;
  }

  public function filterTrackingsA(){
    $this->getDuplicatesTrackingsSearch();
    $this->trigger = true;
  }

  /**
   * @return void
   */
  protected function getDuplicatesTrackings(): void {

    $this->trackings = DB::table('trackings as t')
      ->selectRaw("t.id as tracking_id,b.building_code, CONCAT(u.name, ' ',a.last_name) as user_name, u.email, t.customer_id, CONCAT(c.name,' ',c.last_name) as customer_name,  c.phone as customer_phone, b.id as building_id, b.building_code, b.address, s.name as state_name, s.color as state_color, t.active as activo, t.checked as revisado, t.created_at as creado")
      ->join("customers as c", "t.customer_id", '=', 'c.id')
      ->join("buildings as b", "t.building_id", "=", "b.id")
      ->join("users as u", "t.user_id", "=", "u.id")
      ->join("additionals as a", "u.id", "=", "a.user_id")
      ->join("states as s", "t.state_id", "=", "s.id")
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
     // ->where('b.building_code', 'LIKE', '%' . session('search') . '%')
      ->when(session('search') ,function($query){
        $query->where('b.building_code', 'LIKE', '%' . session('search') . '%')
        ->orWhere('b.address','LIKE', '%'. session('search') . '%');
      })
      ->paginate($this->perPage);



  }

  protected function getDuplicatesTrackingsSearch(): void {
    $perPage = 10;
    $columns = ["*"];
    $queryPage = "page";
    $pageNumber = 1;
    $this->trackings = DB::table('trackings as t')
      ->selectRaw("t.id as tracking_id,b.building_code, CONCAT(u.name, ' ',a.last_name) as user_name, u.email, t.customer_id, CONCAT(c.name,' ',c.last_name) as customer_name,  c.phone as customer_phone, b.id as building_id, b.building_code, b.address, s.name as state_name, s.color as state_color, t.active as activo, t.checked as revisado, t.created_at as creado")
      ->join("customers as c", "t.customer_id", '=', 'c.id')
      ->join("buildings as b", "t.building_id", "=", "b.id")
      ->join("users as u", "t.user_id", "=", "u.id")
      ->join("additionals as a", "u.id", "=", "a.user_id")
      ->join("states as s", "t.state_id", "=", "s.id")
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
      // ->where('b.building_code', 'LIKE', '%' . session('search') . '%')
      ->when(session('search') ,function($query){
        $query->where('b.building_code', 'LIKE', '%' . session('search') . '%')
          ->orWhere('b.address','LIKE', '%'. session('search') . '%');
      })
      ->paginate($perPage, $columns, $queryPage, $pageNumber);



  }

  public function showTracking($buildingID){
    $this->emit('hideSearchDuplicates');
    $this->emitSelf('hideAllDuplicates');
    $this->emit('showShowDuplicateTracking');
    $this->emit('showTrackingDuplicate',$buildingID);
  }

}
