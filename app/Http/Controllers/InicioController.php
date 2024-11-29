<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function mostrarInicio() {
        $user = Auth::user(); // Obtén el usuario autenticado
        //return($user);
        if ($user->puesto_empleado == 0) {
            return view('inicios.admin');

        }elseif ($user->puesto_empleado == 1) {
            return view('inicios.supervisor');
        
        }elseif ($user->puesto_empleado == 2) {
            return view('inicios.calidad');
        
        } elseif ($user->puesto_empleado == 3) {
            return view('inicios.asesor');
        
        }elseif ($user->puesto_empleado == 4) {
            return view('inicios.logistica');
        
        }elseif ($user->puesto_empleado == 5) {
            return view('inicios.almacen');
        
        }elseif ($user->puesto_empleado == 6) {
            return view('inicios.analista');
        
        }elseif ($user->puesto_empleado == 7) {
            return view('inicios.repartidor');
        
        }
}
}