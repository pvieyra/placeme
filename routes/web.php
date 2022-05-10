<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Buildings\BuildingSelect;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Auth::routes();
Route::group(["middleware" => ["auth", "user_is_active", "password.changed"]],function(){
  /*ADMIN ROUTES*/
  Route::group(["middleware" => ["role:administrador"]],function(){
    /* USERS */
    Route::view('/usuarios','users.index')->name('users.index');
    Route::view('/usuarios/crear', 'users.create')->name('users.create');
    Route::get('/usuario/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/usuarios/editar/{user}',[UserController::class,'editUser'])->name('users.edit');

    /* TRACKINGS*/
    Route::get('/seguimientos/admin', [TrackingController::class, 'indexAdminTrackings'])->name('trackings.index-admin');
    //Duplicates Trackings
    Route::get("/seguimientos/duplicados", [TrackingController::class, "duplicate"])->name("trackings.duplicate");
    Route::get("/seguimientos/todos-duplicados", [TrackingController::class, "allDuplicates"])->name("tracking.all-duplicates");

    /* BUILDINGS */
    Route::view("/propiedades","buildings.index")->name("buildings.index");
    Route::get("/propiedad/{building}", [BuildingController::class, 'show'])->name("buildings.show");

    //RUTAS PARA PRUEBAS
    Route::get('datatable/users',[ UserController::class, 'datatableUsers'])->name('datatable.users');
    //Generando una ruto tipo resource para el modelo Project.
      Route::resource('projects', ProjectController::class);
      /* ruta para uso de livewire */
      Route::view('contacts','users.contacts');
    });
  /* ./ ADMIN ROUTES*/

  /* {{ ASESOR ROUTES }} */
  Route::get('/home', [HomeController::class, 'index'])->name('index');

  /* ASESOR TRACKINGS */
  Route::get('/seguimientos', [TrackingController::class, 'index'])->name('trackings.index');
  Route::get('/seguimiento', [TrackingController::class, 'create'])->name('trackings.create');
  Route::post('/seguimiento',[TrackingController::class, 'store'])->name('trackings.store');
  Route::get('/seguimiento/{id}', [TrackingController::class,'show'])->name('trackings.show');
  Route::put('/cambiar-estado', [TrackingController::class, 'updateState'])->name('tracking.update-state');
  //*ASESOR Customer */
  Route::get('/cliente/{customer}', [CustomerController::class, "edit"])->name("customer.edit");
  //Comment Trackings
  Route::post('/agregar-comentario',[CommentController::class, 'store'])->name('comments.store');
  Route::get('/comentarios/{tracking}', [CommentController::class, 'index'])->name('comments.index');

  /* ASESOR BUILDINGS */
  Route::post('/getBuildings',[BuildingController::class, 'selectBuildings'])->name('buildings.select');
});

/* CHANGE PASSWORD*/
Route::get('cambiar-contrasena', [UserController::class, 'changePasswordForm'])->name('users.change.password.form')->middleware('auth');
Route::put('/cambiar-contrasena/{user}',[UserController::class, 'changePassword'])->name('users.change.password');

// Is not active
Route::view("/cuenta-suspendida", "extras.user-is-not-active")->name("inactive.account");



////ROUTE TEST
Route::get('/pruebassql', function(){
  return DB::table('trackings as t')
    ->selectRaw("t.id as tracking_id,b.building_code, CONCAT(u.name, ' ',a.last_name) as user_name, u.email, t.customer_id, CONCAT(c.name,' ',c.last_name) as customer_name,  c.phone as customer_phone, b.id as building_id, b.building_code, b.address, s.name as state_name, s.color as state_color, t.created_at as creado")
    ->join("customers as c","t.customer_id",'=','c.id')
    ->join("buildings as b","t.building_id","=","b.id")
    ->join("users as u", "t.user_id","=","u.id")
    ->join("additionals as a","u.id", "=","a.user_id")
    ->join("states as s","t.state_id", "=", "s.id")
    ->when( session("search"), function( $q ){
      $q->where("s.name", "LIKE", session("search"));
    })
    ->get();
});



Route::get('users/export', [UserController::class,'export']);