<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\ExameneController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\MedicohorarioController;
use App\Http\Controllers\MedicosespecialidadeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleHasPermissionController;
use App\Http\Controllers\SintomaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserenfermedadeController;
use App\Models\Genero;
use App\Models\Medicosespecialidade;
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
    $generos=Genero::all();
    return view('welcome',compact('generos'));
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

Route::resource('medicosespecialidades',MedicosespecialidadeController::class);


route::get('verpacientes/{id}',[UserController::class,'verpacientes'])->name('ver.pacientes');


Route::resource('citas', CitaController::class);

Route::resource('medicohorarios', MedicohorarioController::class);

Route::get('medesp',[MedicosespecialidadeController::class,'medesp'])->name('medesp.med');

Route::post('fotomedico',[UserController::class,'fotoMedico'])->name('fotoMedico');

Route::get('crearcita',[CitaController::class,'crear'])->name('cita.crear');

Route::get('buscarcita',[CitaController::class,'buscar'])->name('cita.buscar');

Route::get('traercitas',[CitaController::class,'traer'])->name('cita.traer');

Route::resource('generos', GeneroController::class);


Route::get('citaspaciente',[CitaController::class,'CitasPaciente'])->name('paciente.citas');

Route::get('citasmedico',[CitaController::class,'CitasMedico'])->name('medico.citas');

Route::get('atender/{id}',[CitaController::class,'atender'])->name('citas.atender');
#finalizar una atención medica
Route::get('finalizar/{id}',[CitaController::class,'finalizar'])->name('citas.finalizar');

Route::resource('userenfermedades',UserenfermedadeController::class);


Route::resource('sintomas',SintomaController::class);

Route::get('editarsintoma',[SintomaController::class,'traer'])->name('sintoma.editar');


Route::resource('examenes',ExameneController::class);


Route::resource('diagnosticos',DiagnosticoController::class);


Route::resource('recetas',RecetaController::class);

Route::get('consulta/{id}',[CitaController::class,'consulta'])->name('consulta.atender');

#atencion parte 2
Route::get('ir/{id}',[CitaController::class,'ir'])->name('cita.ir');

#pdf
Route::get('/verpdf',[CitaController::class,'cita']);
#imprimir una receta
Route::get('imprimirreceta/{id}',[RecetaController::class,'imprimir'])->name('receta.imprimir');


Route::resource('reportes',ReportesController::class);
#citas por especialidad
Route::get('repcitasesp',[ReportesController::class,'citasesp'])->name('reporte.citas.especialidad');
#citas por medico
Route::get('repcitasmed',[ReportesController::class,'dameMedicos'])->name('reporte.citas.medico');
#citas por mes
Route::get('repcitasmes',[ReportesController::class,'dameCitas'])->name('reporte.citas.mes');

#pdf para reporte de citas por especialidad
Route::get('pdfcitasesp',[ReportesController::class,'citaspdf'])->name('reporte.pfd.citas.especialidad');
#pdf para reporte de medicos con citas
Route::get('medicitaspdf',[ReportesController::class,'medicitaspdf'])->name('reporte.pfd.citas.especialidad');
#pdf de reporte de citas por mes
Route::get('citasmes',[ReportesController::class,'citasmes'])->name('reporte.pfd.citas.mes');
#route::get 
Route::get('buscaUser',[UserController::class,'buscar'])->name('user.buscar');

Route::post('registrausuario',[UserController::class,'registra'])->name('usuario.guardar');

#imprimir una cita

Route::get('imprimecita/{id}',[ReportesController::class,'imprimeCita'])->name('cita.imprimir');