<?php

namespace App\Http\Livewire\Buildings;

use Livewire\Component;

class SearchBuildings extends Component {
  public $search = "";

  public function mount(){
    $this->search = session("search-building");
  }

  public function render() {
    return view('livewire.buildings.search-buildings');
  }

  public function updatedSearch( $search ){
    $this->search = $search;
    session()->put( "search-building", $search);
    session()->save();
    //event search building
    $this->emit("searchBuildingTrackings");
  }
}
