<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\EquipoController;

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

Route::get('/ventas/curso', [VentasController::class, 'curso'])->middleware('auth');

Route::get('/ventas/terminadas', [VentasController::class, 'terminadas'])->middleware('auth');
Route::get('/ventas/{id}/fecha', [VentasController::class, 'fecha'])->middleware('auth');
Route::post('/ventas/{id}/cancel', [VentasController::class, 'cancel'])->middleware('auth');
Route::post('/ventas/{id}/saveDate', [VentasController::class, 'saveDate'])->middleware('auth');
Route::get('/ventas/{id}/show', [VentasController::class, 'show'])->middleware('auth');
Route::get('/ventas/{id}/edit', [VentasController::class, 'edit'])->middleware('auth');
Route::get('/ventas/{id}/reenviar', [VentasController::class, 'reenviar'])->middleware('auth');
Route::get('/ventas/dia', [VentasController::class, 'dia'])->middleware('auth');
Route::get('/ventas/mes', [VentasController::class, 'mes'])->middleware('auth');
Route::get('/ventas/{id}/sshow', [VentasController::class, 'sshow'])->middleware('auth');
Route::get('/ventas/pendienteRevision', [VentasController::class, 'pendienteRevision'])->middleware('auth');
Route::get('/ventas/{id}/cshow', [VentasController::class, 'cshow'])->middleware('auth');
Route::post('/ventas/{id}/aceptar', [VentasController::class, 'aceptar'])->middleware('auth');
Route::post('/ventas/{id}/rechazar', [VentasController::class, 'rechazar'])->middleware('auth');
Route::get('/ventas/pendienteAnalisis', [VentasController::class, 'pendienteAnalisis'])->middleware('auth');
Route::get('/ventas/{id}/ashow', [VentasController::class, 'ashow'])->middleware('auth');
Route::post('/ventas/{id}/analisis', [VentasController::class, 'analisis'])->middleware('auth');
Route::get('/ventas/conRuta', [VentasController::class, 'conRuta'])->middleware('auth');
Route::get('/ventas/entregadas', [VentasController::class, 'entregadas'])->middleware('auth');
Route::get('/ventas/{id}/contrato', [VentasController::class, 'contrato'])->middleware('auth');
Route::post('/ventas/{id}/finalizar', [VentasController::class, 'finalizar'])->middleware('auth');

Route::get('/ventas/pendienteZona', [VentasController::class, 'pendienteZona'])->middleware('auth');
Route::get('/ventas/{id}/asignarZona', [VentasController::class, 'asignarZona'])->middleware('auth');
Route::post('/ventas/{id}/zonaAsignada', [VentasController::class, 'zonaAsignada'])->middleware('auth');
Route::get('/ventas/enviadas', [VentasController::class, 'enviadas'])->middleware('auth');
Route::post('/ventas/{id}/envio', [VentasController::class, 'envio'])->middleware('auth');
Route::get('/ventas/{id}/lshow', [VentasController::class, 'lshow'])->middleware('auth');


Route::get('/equipos/asignados', [EquipoController::class, 'asignados'])->middleware('auth');
Route::get('/equipos/inventario', [EquipoController::class, 'inventario'])->middleware('auth');


Route::get('/asesores/lista', [AsesorController::class, 'lista'])->middleware('auth');
Route::get('/asesores/{id}/show', [AsesorController::class, 'show'])->middleware('auth');

Route::post('/zonas/{id}/delete', [ZonaController::class, 'delete'])->middleware('auth');

Route::resource('/asesores', AsesorController::class)->middleware('auth');
Route::resource('/ventas', VentasController::class)->middleware('auth');
Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/rutas', RutaController::class)->middleware('auth');
Route::resource('/zonas', ZonaController::class)->middleware('auth');
Route::resource('/equipos', EquipoController::class)->middleware('auth');



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

Route::view('about', 'about')->name('about');