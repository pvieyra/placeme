<?php

namespace App\Http\Livewire\Buildings;

use Livewire\Component;

class BuildingSelect extends Component {
  public $ottPlataform = "";
  public $webseries = [
    'Wanda Vision',
    'Money',
    'Luc',
    'Strange'
  ];
    public function render()
    {
        return view('livewire.buildings.building-select');
    }
}
