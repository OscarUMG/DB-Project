<?php

use App\Http\Controllers\CatedraticoController;
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
Route::get('/catedratico', [CatedraticoController::class, 'index'])->middleware('auth.catedratico')->name('catedratico.index');
Route::get('/catedratico/ingresar-notas/{curso_id}', [CatedraticoController::class, 'notas'])->middleware('auth.catedratico')->name('catedratico.ingresar_notas');
Route::post('/catedratico/store', [CatedraticoController::class, 'store'])->middleware('auth.catedratico')->name('catedratico.store');

//Rutas Tesoreria
Route::get('/tesoreria', [TesoreriaController::class, 'index'])->middleware('auth.tesoreria')->name('tesoreria.index');
Route::get('/tesoreria/ingresar-pago/', [TesoreriaController::class, 'pago'])->middleware('auth.tesoreria')->name('tesoreria.pago');
Route::post('/tesoreria/store', [TesoreriaController::class, 'store'])->middleware('auth.tesoreria')->name('tesoreria.store');