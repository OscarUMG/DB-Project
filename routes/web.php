<?php

use App\Http\Controllers\AsignacionCatCursoController;
use App\Http\Controllers\AsignacionCursoController;
use App\Http\Controllers\CatedraticoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TesoreriaController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $user = DB::select('SELECT u.username, u.email, r.nombre_rol FROM users u INNER JOIN rol r ON u.id_rol = r.id');

    return view('home')->with('user', $user);
})->middleware('auth');

//Rutas de registro
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Rutas de login
Route::get('/login', [SessionsController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

//Rutas catedratico
Route::get('/catedratico', [NotaController::class, 'index'])->middleware('auth.catedratico')->name('nota.index');
Route::get('/catedratico/ingresar-notas/{curso_id}', [NotaController::class, 'notas'])->middleware('auth.catedratico')->name('nota.create');
Route::post('/catedratico/nota/store', [NotaController::class, 'store'])->middleware('auth.catedratico')->name('nota.store');

//Rutas Tesoreria
Route::get('/tesoreria', [TesoreriaController::class, 'index'])->middleware('auth.tesoreria')->name('tesoreria.index');
Route::get('/tesoreria/ingresar-pago', [TesoreriaController::class, 'pago'])->middleware('auth.tesoreria')->name('tesoreria.pago');
Route::post('/tesoreria/store', [TesoreriaController::class, 'store'])->middleware('auth.tesoreria')->name('tesoreria.store');

//Rutas Secretaria
Route::get('/inscripcion', [InscripcionController::class, 'index'])->middleware('auth.secretaria')->name('inscripcion.index');
Route::get('/inscripcion/crear', [InscripcionController::class, 'inscripcion'])->middleware('auth.secretaria')->name('inscripcion.create');
Route::post('/inscripcion/store', [InscripcionController::class, 'store'])->middleware('auth.secretaria')->name('inscripcion.store');

//Rutas tesoreria
Route::get('/asignar-curso-estudiante', [AsignacionCursoController::class, 'index'])->middleware('auth.secretaria')->name('asignacion-estudiante.index');
Route::get('/asignar-curso-estudiante/crear', [AsignacionCursoController::class, 'asignacion'])->middleware('auth.secretaria')->name('asignacion-estudiante.create');
Route::get('/asignar-curso-estudiante/buscar', [AsignacionCursoController::class, 'buscar'])->middleware('auth.secretaria')->name('asignacion-estudiante.buscar');
Route::post('/asignar-curso-estudiante/store', [AsignacionCursoController::class, 'store'])->middleware('auth.secretaria')->name('asignacion-estudiante.store');

//Rutas Secretaria
Route::get('/asignar-curso-catedratico', [AsignacionCatCursoController::class, 'index'])->middleware('auth.secretaria')->name('asignacion-catedratico.index');

Route::get('/catedratico/crear', [CatedraticoController::class, 'catedratico'])->middleware('auth.secretaria')->name('catedratico.create');
Route::post('/catedratico/store', [CatedraticoController::class, 'store'])->middleware('auth.secretaria')->name('catedratico.store');

Route::get('/asignar-curso-catedratico/crear', [AsignacionCatCursoController::class, 'asignacion'])->middleware('auth.secretaria')->name('asignacion-catedratico.create');
Route::get('/asignar-curso-catedratico/buscar', [AsignacionCatCursoController::class, 'buscar'])->middleware('auth.secretaria')->name('asignacion-catedratico.buscar');
Route::post('/asignar-curso-catedratico/store', [AsignacionCatCursoController::class, 'store'])->middleware('auth.secretaria')->name('asignacion-catedratico.store');

//Rutas Estudiante
Route::get('/estudiante', [EstudianteController::class, 'index'])->middleware('auth.estudiante')->name('estudiante.index');
Route::get('/estudiante/ver-notas/{curso_id}/{id_estudiante}', [EstudianteController::class, 'notas'])->middleware('auth.estudiante')->name('estudiante.view');