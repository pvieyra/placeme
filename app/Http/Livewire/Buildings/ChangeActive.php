<?php

namespace App\Http\Livewire\Buildings;

use Livewire\Component;

class ChangeActive extends Component {
  public $building;
  public $isActive;

  public function mount($building){
    $this->isActive = $building->active;
  }

  public function render() {
    return view('livewire.buildings.change-active');
  }

  public function active(){
    if( $this->isActive ){
      $this->building->update([
        'active' => 0,
      ]);
      $this->isActive = 0;
    } else {
      $this->building->update([
        'active' => 1,
      ]);
      $this->isActive = 1;
    }
  }
}
