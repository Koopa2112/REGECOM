<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function login(){

        
    $credentials = request()->validate([
        'user' => ['required', 'string'], 
        'password' => ['required', 'string']
    ]);

    $remember = request()->filled('remember');
    //return($credentials);
    if(Auth::attempt($credentials, $remember) ){
        if (auth()->user()->estado) {
            request()->session()->regenerate();
            return redirect('inicio');
        } else {
            // Si el estado es falso, cerrar sesión y redirigir a una página de acceso denegado
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => __("No tienes permitido el acceso")
            ]);
        }
    }
        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
        

    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
