<?php

namespace App\Http\Livewire\Users;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component{

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
      'role' => [
        'required'
      ],
      'photo_profile' => [
        'image',
        'max:2048',
        'mimes:jpeg,png,jpg,svg,gif'
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
    'photo_profile.max' => "El tamaño maximo de la imagen es 2mb",
    'photo_profile.mimes' => "El archivo debe ser de tipo imagen",
  ];


  public function updated($propertyName){
    $this->validateOnly($propertyName);
  }

  public function submit(){
    // Validacion
    $validateData = $this->validate();
   /* $this->validate([
      'name' => 'required|string',
    ]);*/
  }
}
