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
    if(Auth::attempt($credentials, true)){
        
        request()->session()->regenerate();
        return redirect('inicio');
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
