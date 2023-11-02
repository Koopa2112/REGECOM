<?php

use App\Http\Controllers\AsesorController;
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
    return view('welcome');
});

Route::view('/', 'welcome');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('inicio', 'inicio')->middleware('auth');
Route::post('login', function(){
    $credentials = request()->only('user', 'password');
    if(Auth::attempt($credentials)){
        request()->session()->regenerate();
        return redirect('/asesores');
    }
        return redirect('login');
    
}
);


Route::resource('/asesores', AsesorController::class)->middleware('auth');