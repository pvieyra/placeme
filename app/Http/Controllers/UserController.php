<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordForm;
use App\Models\Additional;
use App\Models\User;
use http\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

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

//  public function datatableUsers(){
//    $users = User::select('id','name','email')->with('additional:user_id,last_name,change_password,active','roles:name');
//    return  DataTable()->eloquent($users)
//      ->addColumn('change_password',function (User $user){
//        return ($user->additional->change_password)? '<div> <span class="text-red-500"> Cambio </span> </div>': '<div> <span class="text-green-500"> Cambio</span></div>';
//      })
//      ->addColumn('action',function(User $user ){
//        $acciones = '<a href="#edit-'. $user->id .'"> <i class="material-icons">create</i></a>';
//        return $acciones;
//      })
//      ->addColumn('last_name', function(User $user){
//        return $user->additional->last_name;
//      })
//      ->addColumn('role', function(User $user){
//        return $user->getRoleNames()->first();
//      })
//      ->rawColumns(['change_password','action'])
//      ->make(true);
//  }
  public function datatableUsers(){
    $query = User::with('additional','roles')->select('users.*');
    return DataTables()->eloquent($query)
      ->addColumn('action', function(User $user){
        $acciones = '<a href="home"> <i class="material-icons">create</i></a>';
        return $acciones;
      })

      ->rawColumns(['action'])
      ->make( true );
  }

  public function demo(){
    $query = User::with('additional','roles')->select('users.*');
    return DataTables()->eloquent($query)
      ->addColumn('action', function(User $user){
        $acciones = '<a href="home"> <i class="material-icons">create</i></a>';
        return $acciones;
      })

      ->rawColumns(['action'])
      ->make( true );
  }
}
