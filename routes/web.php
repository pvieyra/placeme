<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Buildings\BuildingSelect;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alpha', function(){
  return view('alpha');
});

Auth::routes();
Route::group(['middleware' => ['auth','password.changed']],function(){
  Route::group(['middleware' => ['role:administrador']],function(){
    /* USERS */
    Route::view('crear-usuarios', 'users.create')->name('users.create');
    //Route::view('ver-usuarios', 'users.index.backup')->name('users.index'); ruta anterior con data table.
    //Usuarios livewire
    Route::view('/usuarios','users.index')->name('users.index');
    //Route::view('/usuarios/editar/{id}','users.edit')->name('users.edit');
    Route::get('/usuarios/editar/{user}',[UserController::class,'editUser'])->name('users.edit');


    Route::get('datatable/users',[ UserController::class, 'datatableUsers'])->name('datatable.users');
    //Generando una ruto tipo resource para el modelo Project.
      Route::resource('projects', ProjectController::class);
      /* ruta para uso de livewire */
      Route::view('contacts','users.contacts');
    });
  //ruta para verificar los permisos de las cuentas.
  //Route::get('/crear-usuario-roles', [UserController::class, 'crearRoles'])->name('roles');
  Route::get('/home', [HomeController::class, 'index'])->name('index');

  // ### Seguimientos ###
  //Route::view('crear-seguimiento', 'trackings.create')->name('trackings.create');
  Route::get('/seguimientos', [TrackingController::class, 'index'])->name('trackings.index');
  Route::get('/seguimiento', [TrackingController::class, 'create'])->name('trackings.create');
  Route::post('/seguimiento',[TrackingController::class, 'store'])->name('trackings.store');
  Route::get('/seguimiento/{id}', [TrackingController::class,'show'])->name('trackings.show');
  //seguimientos duplicados
  Route::get('/seguimientos/duplicados', [TrackingController::class, 'duplicate'])->name('trackings.duplicate');
  Route::put('/cambiar-estado', [TrackingController::class, 'updateState'])->name('tracking.update-state');
  //Comentarios de los seguimientos
  Route::post('/agregar-comentario',[CommentController::class, 'store'])->name('comments.store');
  Route::get('/comentarios/{tracking}', [CommentController::class, 'index'])->name('comments.index');

  //Buildings livewire
  Route::view('/propiedades','buildings.index')->name('buildings.index');

  // ## Buildings select2 component ## //
  Route::post('/getBuildings',[BuildingController::class, 'selectBuildings'])->name('buildings.select');
});

//ruta para verificar el cambio de contraseña.
Route::get('cambiar-contrasena', [UserController::class, 'changePasswordForm'])->name('users.change.password.form')->middleware('auth');
//Route::post('cambiar-contrasena', [UserController::class, 'changePassword'])->name('users.change.password');
Route::put('/cambiar-contrasena/{user}',[UserController::class, 'changePassword'])->name('users.change.password');
Route::get('pruebas',[ UserController::class, 'demo'])->name('datatable.users.demo');

Route::get('/pruebassql', function(){
  return Tracking::select()
    ->with('customer')
    ->groupBy('customer_id')
    ->get();
});