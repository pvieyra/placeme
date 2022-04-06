<?php

namespace App\Http\Livewire\Trackings;

use Livewire\Component;

class Create extends Component {
  public $name;
  public $last_name;
  public $second_last_name;
  public $email;
  public $phone;
  public $user_id;
  public $customer_id;
  public $building_id;
  public $state_id;
  public $numero_interior_unidad;
  public $contact_type;
  public $inmobiliaria_name;
  public $nombre_asesor;
  public $celular_asesor;


  public function render() {
    return view('livewire.trackings.create');
  }
}
