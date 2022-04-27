<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Manny\Manny;

class Edit extends Component{

  use WithFileUploads;
  public  $name;
  public $email;
  public $last_name;
  public $second_lastname;
  public $phone;
  public $rol;
  public $password;
  public $currentImage;
  public $photo_profile;


  public function mount($user){
    $this->name = $user->name;
    $this->email = $user->email;
    $this->last_name = $user->additional->last_name;
    $this->second_lastname = $user->additional->second_lastname;
    $this->phone = $user->additional->phone;
    $this->rol = $user->roles->first()->name;
    $this->currentImage = $user->additional->photo_profile;
  }
  public function render(){
    return view('livewire.users.edit');
  }


  protected function rules(){
    //se debe condicionar si se esta actualizando una imagen.
    return [
      'password' => [
        'required',
        'string',
        'min:8',
      ],
      'phone' => [
        Rule::when($this->phone, ['min:10']),
      ],
      'photo_profile' => [
        Rule::when($this->photo_profile,['image','max:1024','mimes:jpg,png,jpeg,gif']),
        //'image',
      ],
    ];
  }

  //mensajes de validacion personalizados.
  protected $messages = [
    'password.required' => "La contraseña es obligatoria",
    'password.min' => "La contraseña debe de contener minimo 8 caracteres",
    'phone.min' => "El telefono debe contener 10 digitos",
    'photo_profile.image' => "Solo se permiten subir imagenes",
    'photo_profile.max' => "El tamaño maximo de la imagen es 2mb",
    'photo_profile.mimes' => "El archivo debe ser de tipo imagen",
  ];
  public function updated($propertyName){
    $this->validateOnly($propertyName);
    /* manny mask */
    if($propertyName == 'phone' ){
      $this->phone = Manny::mask($this->phone, "(11) 1111-1111");
    }
  }
}
