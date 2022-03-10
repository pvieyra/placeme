<?php

namespace App\Http\Livewire;

use App\Models\Contact as Contactos;
use Livewire\Component;

class Contact extends Component {

  public $data;
  public $name;
  public $email;
  public $selected_id;
  public $updateMode = false;


  private function resetInput(){
    $this->name = null;
    $this->email = null;
  }

  public function store(){
    $this->validate([
      'name' => 'required|min:5',
      'email' => 'required|email:rfc,dns',
    ]);

    //modificador de la clase contacts
    Contactos::create([
      'name' => $this->name,
      'email' => $this->email
    ]);

    $this->resetInput();
  }

  public function edit( $id ){
    $contacto = Contactos::findOrFail( $id );
    $this->selected_id = $id;
    $this->name = $contacto->name;
    $this->email = $contacto->email;

    $this->updateMode = true;
  }

  public function update(){
    $this->validate([
      'selected_id' => 'required|numeric',
      'name' => 'required|min:5',
      'email' => 'required|email:rfc,dns'
    ]);

    if($this->selected_id) {
      $contacto = Contactos::find($this->selected_id);
      $contacto->update([
        'name' => $this->name,
        'email' => $this->email,
      ]);

      $this->resetInput();
      $this->updateMode = false;
    }
  }

  public function destroy( $id ) {
    if( $id ){
      $contacto = Contactos::where('id', $id);
      $contacto->delete();
      $this->resetInput();
    }
  }

  public function render(){
    $this->data = Contactos::all();
    return view('livewire.contact');
  }


}
