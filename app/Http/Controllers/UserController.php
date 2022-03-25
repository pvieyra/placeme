<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordForm;
use App\Models\User;
use http\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller{
  /**
   * Show the form for creating a new resource.
   *
   */
  public function changePasswordForm(){
    return view('auth.passwords.change-password');
  }

  public function changePassword(ChangePasswordForm $request, User $user){
    try {
      DB::transaction(function() use( $request, $user){
        $user->update([
          'password' => Hash::make($request->password),
        ]);
        $user->additional()->update([
          'change_password' => 1
        ]);
      });
      return redirect()->route('index');
    } catch (Exception $e){
      return $e->getMessage();
    }
  }

  public function datatableUsers(){
    $users = User::select('id','name','email')->get();
    //dd($users);
    return  datatables()->of($users)->addColumn('action',function( $user ){
      $acciones = '<a href="#edit-'. $user->id .'"> <i class="material-icons">create</i></a>';
//      /**/$acciones .= '<a href="" class="btn" > <i class="material-icons"></i> </a>';
      return $acciones;
    })->make();
  }
}
