<?php

namespace App\Http\Livewire\Users;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Throwable;

class ResetPassword extends Component{
  public $user;
  public $isChanged;

  public function mount($user){
    $this->isChanged = $this->user->additional->changed();
  }

  public function render(){
    return view('livewire.users.reset-password');
  }

  public function resetPassword(){
    if( $this->isChanged ){
      try{
        $this->user->update([
          'password' => Hash::make("password"),
        ]);
        $this->user->additional->update([
          'change_password' => 0,
        ]);
        $this->isChanged= 0;

      } catch(Throwable $exception){
        return $exception->getMessage();
      }

    } else {
      $this->user->additional->update([
        'change_password' => 1,
      ]);
      $this->isChanged = 1;
    }
  }


}
