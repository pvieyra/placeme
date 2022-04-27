<?php

namespace App\Http\Livewire\Buildings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Building;

class BuildingComponent extends Component {
  use WithPagination;
  public $building_id;
  public $building_code;
  public $address;
  public $suburb;
  public $municipality;
  public $int_number;
  public $zip;
  public $alias;
  public $comments;
  public $active;
  public $view = 'create';

  protected $messages = [
    'building_code.required' => "El codigo de la propiedad es obligatoria.",
    'building_code.unique' => "Este codigo ya existe para otra propiedad puedes editarla.",
    'address.required' => "La direccion de la propiedad es obligatoria",
    'suburb.required' => "La colonia de la propiedad es obligatoria",
    'municipality.required' => "El municipio es obligatorio",
  ];

  protected function rules(){
    return [
      'building_code' => [ 'required','unique:buildings'],
      'address'=> ['required'],
      'suburb'=> ['required'],
      'municipality'=> ['required'],
    ];
  }
  public function render(){
    return view('livewire.buildings.building-component');
  }
  public function updated($propertyName){
    $this->validateOnly($propertyName);
  }
  public function getBuildingsProperty(){
    return Building::query()
      ->when($this->building_code, function($query){
        return $query->where('building_code','like',"%{$this->building_code}%");
      })
    ->orderBy('created_at','desc')->paginate(10);
  }

  public function store(){
    $this->validate();
    $building = Building::create([
       'building_code'=> $this->building_code,
       'address'=> $this->address,
       'suburb'=> $this->suburb,
       'municipality'=> $this->municipality,
       'int_number'=> $this->int_number,
       'zip'=> $this->zip,
       'alias'=> $this->alias,
       'comments'=> "",
       'active'=> 1,
    ]);
    $this->edit($building->id);
    //$this->reset();
  }

  public function edit($id){
     $building = Building::findOrFail($id);
     $this->building_id = $building->id;
     $this->building_code = $building->building_code;
     $this->address = $building->address;
     $this->suburb = $building->suburb;
     $this->municipality = $building->municipality;
     $this->int_number = $building->int_number;
     $this->zip = $building->zip;
     $this->alias = $building->alias;
     $this->comments = $building->comments;
     $this->view = 'edit';
  }

  public function update(){
    $this->validate([
      'building_code'=> 'required',
      'address'=> 'required',
      'suburb'=> 'required',
      'municipality'=> 'required',
    ]);
    $building = Building::findOrFail($this->building_id);
    $building->update([
      'building_code'=> $this->building_code,
      'address'=> $this->address,
      'suburb'=> $this->suburb,
      'municipality'=> $this->municipality,
      'int_number'=> $this->int_number,
      'zip'=> $this->zip,
      'alias'=> $this->alias,
      'comments'=> "",
      'active'=> 1,
    ]);
    $this->default();
  }

  public function default(){
    $this->reset();
    $this->view = 'create';
  }

  public function changeBuildingActive($id){
    $building = Building::findOrFail($id);
    try{
      if($building->active){
        $this->activeText = "Activar";
        $building->active = 0;
      }else{
        $this->activeText = "Desactivar";
        $building->active = 1;
      }
      $building->save();
    }catch(Exception $exception){
      return $exception->getMessage();
    }
  }
}
