<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use Livewire\Component;

class Create extends Component {
    public $link;
    public $subject;

    protected function rules(){
      return [
        "link" => [
          "required",
          "url"
        ],
        "subject" => [
          "required"
        ],
      ];
    }

    protected $messages = [
      "link.required" => "El link es obligatorio",
      "link.url" => "El link no es valido",
      "subject.required" => "El nombre del link es obligatorio",
    ];



    public function render(){
      return view('livewire.links.create');
    }

    public function updated( $propertyName ){
      $this->validateOnly( $propertyName );
    }

    public function submit(){
      $this->validate();
      $link = Link::create([
        "name" => $this->subject,
        "link" => $this->link,
      ]);

      session()->flash('message', __("El link fue creado correctamente."));
      $this->reset();
      $this->emit("getAllLinks");
    }
}
