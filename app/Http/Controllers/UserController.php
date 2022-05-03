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
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

use App\Exports\UsersExport;


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
    $query = User::with('additional','roles')->select('users.*');
    return DataTables()->eloquent($query)
      ->addColumn('action', function(User $user){
        $acciones = '<a href="home"> <i class="material-icons">create</i></a>';
        return $acciones;
      })
      ->rawColumns(['action'])
      ->make( true );
  }

  public function editUser(User $user){
    //$user = User::findOrFail($id);
    return view('users.edit',compact('user'));
  }

  public function show(User $user){
    return view('users.show',compact('user'));
  }

  /* Export Excel */
  public function export(){
    return Excel::download( new UsersExport, 'users.xlsx');
  }
}
