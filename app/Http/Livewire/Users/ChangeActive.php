<?php

namespace App\Http\Livewire\Users;

use App\Models\Additional;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangeActive extends Component{
  public $user;
  public $isActive;


  public function mount($user){
    $this->isActive = $user->additional->active;
  }

  public function render(){
    return view('livewire.users.change-active');
  }

  public function active(){
    if( $this->isActive ){
      $this->user->additional->update([
        'active' => 0,
      ]);
      $this->isActive = 0;
    } else {
      $this->user->additional->update([
        'active' => 1,
      ]);
      $this->isActive = 1;
    }
  }
}
