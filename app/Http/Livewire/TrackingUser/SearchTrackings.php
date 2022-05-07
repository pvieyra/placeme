<?php

namespace App\Http\Livewire\TrackingUser;

use Livewire\Component;

class SearchTrackings extends Component{

  public $search = "";

  public function mount(){
    $this->search = session("search");
  }

  public function render(){
    return view('livewire.tracking-user.search-trackings');
  }

  public function updatedSearch( $search ){
    $this->search = $search;
    session()->put("search", $search );
    session()->save();
    //event search
    $this->emit("searchUserTrackings");
  }
}
