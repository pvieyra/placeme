<?php

namespace App\Http\Livewire\Users;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Manny\Manny;

class Create extends Component{
  //trait para subir imagenes.
  use WithFileUploads;

  public $name;
  public $email;
  public $password;
  public $last_name;
  public $second_lastname;
  public $phone;
  public $photo_profile;
  public $role;

  public function render(){
    return view('livewire.users.create');
  }

  /**
   * @return \string[][]
   */
  protected function rules(){
    //se debe condicionar si se esta actualizando una imagen.
    return [
      'name' => [
        'required',
      ],
      'last_name' => [
        'required',
        'string'
      ],
      'second_lastname' => [
        'string',
      ],
      'email' => [
        'required',
        'string',
        'email',
        'max:255',
        'unique:users'
      ],
      'password' => [
        'required',
        'string',
        'min:8',
      ],
      'phone' => [
        Rule::when($this->phone, ['min:10']),
      ],
      'role' => [
        'required'
      ],
      'photo_profile' => [
        Rule::when($this->photo_profile,['image']),
        //'image',
      ],
    ];
  }

  //mensajes de validacion personalizados.
  protected $messages = [
    'name.required' => "El nombre del usuario es obligatorio.",
    'name.string' => "Solo puedes utilizar letras.",
    'last_name.required' => "El apellido paterno es obligatorio.",
    'second_lastname.string' => "No se permiten numeros",
    'email.required' => "El correo electronico es obligatorio",
    'email.email' => "No es correo valido.",
    'email.unique' => "Este correo ya fue utilizado para alguna cuenta.",
    'password.required' => "La contraseña es obligatoria",
    'password.min' => "La contraseña debe de contener minimo 8 caracteres",
    'role.required' => "Debes seleccionar un rol para el usuario",
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

  public function submit(){
    // Validacion
    $validateData = $this->validate();
  }
}
