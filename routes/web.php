<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
//Generando una ruto tipo resource para el modelo Project.
Route::resource('projects', ProjectController::class);

/* ruta para uso de livewire */
Route::view('contacts','users.contacts');
//ruta para verificar los permisos de las cuentas.
Route::get('/crear-usuario-roles', [UserController::class, 'crearRoles'])->name('roles');

