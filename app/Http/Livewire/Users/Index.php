<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Index extends Component{
  use WithPagination;
  public $searchName;
  public $searchEmail;
  public $colorError;


  public function render(){
    return view('livewire.users.index');
  }

  public function getUsersProperty(){

    $user = User::query()
      ->when($this->searchEmail, function($query){
        return $query->where('email','like',"%{$this->searchEmail}%")
          ->orWhere('name','like',"%{$this->searchEmail}%");
      })
      ->orderBy('id','desc')->paginate(10);
    if($this->searchEmail){
      $perPage = 10;
      $columns = ["*"];
      $queryPage = "page";
      $pageNumber = 1;
      User::paginate($perPage, $columns, $queryPage, $pageNumber);
    }
    return $user;
  }

  public function changeUserActive($id){
    $user = User::findOrFail($id);
    try {
      if($user->additional->active){
        $user->additional()->update([
          'active' => 0
        ]);
      } else {
        $user->additional()->update([
          'active' => 1
        ]);
      }
    } catch(Exception $exception){

    }
  }
}
