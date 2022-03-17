<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller{
  public function crearRoles(){
    //dd(Auth::user());
    try {
      DB::transaction(function(){
        $adminRole = Role::create(['name' => "administrador"]);
        Auth::user()->assignRole( $adminRole );
      });
    } catch ( Throwable $e){
      return $e->getMessage();
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   */
  public function create(){

  }

}
