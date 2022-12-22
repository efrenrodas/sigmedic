<?php

use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleHasPermissionController;
use App\Http\Controllers\UserController;
use App\Models\Permission;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::resource('roles',RoleController::class);

Route::resource('permissions',PermissionController::class);

route::get('dameUsuarios',[UserController::class,'damePacientes'])->name('dame.pacientes');

route::get('dameMedicos',[UserController::class,'dameMedicos'])->name('dame.medicos');

Route::resource('medicos',MedicoController::class);

Route::resource('users',UserController::class);

Route::get('rolespermisos',[RoleController::class,'rolPermiso'])->name('rol.permiso');

Route::resource('especialidades', EspecialidadeController::class);
