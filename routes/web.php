<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExcelReports;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
//use App\Http\Livewire\Buildings\BuildingSelect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('auth.login');
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

    /* ENLACES */
    Route::get("/enlaces", [LinkController::class, "index"])->name("link.index");

    /* REPORTES */
    Route::get('/reportes/usuarios', [ ExcelReports::class, 'usersReport'])->name('users-report.index');
    Route::get('/reportes/seguimientos', [ ExcelReports::class, 'trackingsReport'])->name('trackings-report.index');
    Route::get('/reportes/asesor', [ ExcelReports::class, 'usersTrackingReport'])->name('users-trackings-report.index');
    Route::get('/reportes/propiedad', [ ExcelReports::class, 'buildingTrackingReport'])->name('building-trackings-report.index');



    Route::get('/excel/seguimientos', [ ExcelReports::class, 'exportReportTrackings'])->name('export-report-trackings');
    Route::get('/excel/por/usuario', [ ExcelReports::class, 'exportReportUserTrackings'])->name('export-report-user-trackings');
    Route::get('/excel/por/propiedad', [ ExcelReports::class, 'exportReportBuildingTrackings'])->name('export-report-building-trackings');

    Route::get('/excel/usuarios', [ ExcelReports::class, 'export'])->name('export');

    //RUTAS PARA PRUEBAS
    Route::get('datatable/users',[ UserController::class, 'datatableUsers'])->name('datatable.users');
    //Generando una ruto tipo resource para el modelo Project.
    Route::resource('projects', ProjectController::class);
      /* ruta para uso de livewire */
    Route::view('contacts','users.contacts');

    /** para seleccionar usuarios  en reportes */
    Route::post('/getUsersReports',[UserController::class, 'selectUsers'])->name('users.select');
    Route::post('/getBuildingsReports',[BuildingController::class, 'selectBuildingsReports'])->name('building-reports.select');


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




