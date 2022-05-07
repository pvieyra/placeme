<?php

namespace App\Http\Livewire\Trackings;

use Livewire\Component;

class ChangeActive extends Component{
  public $tracking;
  public $isActive;

  public function mount( $tracking ){
    $this->isActive = $tracking->active;
  }

  public function render(){
    return view('livewire.trackings.change-active');
  }

  public function active(){
    if( $this->isActive ){
      $this->tracking->update([
        'active' => 0,
      ]);
      $this->isActive = 0;
    } else {
      $this->tracking->update([
        'active' => 1,
      ]);
      $this->isActive = 1;
    }
  }

}
