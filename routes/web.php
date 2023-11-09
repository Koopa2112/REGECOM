<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\puesto_empleadoMiddleware;


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


Route::view('/', 'login');
Route::view('login', 'login')->name('login')->middleware('guest');




//Route::view('inicio', 'inicios.asesor')->middleware('auth');

//Route::view('');



Route::post('login', function(){
}
);



Route::resource('/asesores', AsesorController::class)->middleware('auth');
Route::resource('/ventas', VentasController::class)->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::get('inicio', [InicioController::class, 'mostrarInicio'])->middleware('auth');
