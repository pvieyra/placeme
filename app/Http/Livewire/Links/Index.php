<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use Livewire\Component;

class Index extends Component{

  protected $links;
  public $trigger = FALSE;

  protected $listeners = [
    'getAllLinks' => 'getLinks',
  ];

  public function render(){
    if(! $this->trigger ){
      $this->getLinks();
    }
    return view('livewire.links.index', [
      'links' => $this->links,
    ]);
  }

  public function getLinks(){
    $this->links = Link::all();
    $this->trigger = TRUE;
  }

  public function delete( $id ){
    $this->trigger = FALSE;
    $link = Link::find( $id );
    $link->delete();
    $this->emit('getAllLinks');
  }
}
