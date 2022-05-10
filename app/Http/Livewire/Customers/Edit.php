<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;

class Edit extends Component {

  public $customer;
  public $name;
  public $last_name;
  public $email;

  public function render() {
    return view('livewire.customers.edit');
  }

  public function mount( $customer){
    $this->customer = $customer;
    $this->name = $customer->name;
    $this->last_name = $customer->last_name;
    $this->second_last_name = $customer->second_last_name;
    $this->email = $customer->email;
  }

  protected $messages = [
    'name.required' => "Debes colocar al menos un nombre.",
    'email.email' => "Debes colocar un correo valido",
  ];
  protected function rules(){
    return [
      'name' => [ 'required'],
      'email'=> ['email'],
    ];
  }

  public function updated($propertyName){
    $this->validateOnly($propertyName);
  }

  public function update(){
    $this->validate();
    $this->customer->update([
      'name'=> $this->name,
      'last_name'=> $this->last_name,
      'second_last_name'=> $this->second_last_name,
      'email'=> $this->email,
    ]);
    session()->flash('message', __('Cliente actualizado.'));
  }


}
