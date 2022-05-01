<?php

namespace App\Http\Livewire\Trackings;

use Livewire\Component;

class SearchDuplicatesTrackings extends Component{
  public $search = "";
  public $show = TRUE;
  protected $listeners = [
    'hideSearchDuplicates' => 'hideSearch',
    'showSearchDuplicates' => 'showSearch',
  ];

  public function render(){
    return view('livewire.trackings.search-duplicates-trackings');
  }


  public function hideSearch(){
    $this->show = FALSE;
  }
  public function showSearch(){
    $this->show = TRUE;
  }
  public function mount(){
    $this->search = session('search');
  }

  public function updatedSearch( $search ){
    $this->search = $search;
    session()->put('search', $search);
    session()->save();
    $this->emit('searchDuplicatesTrackings');
  }
}
