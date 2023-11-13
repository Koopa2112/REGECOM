<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\asesores;
use App\Models\analistas;
use App\Models\administrativos;
use Illuminate\Http\Request;
use Illuminate\Support\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //return($request);
        $request->validate([
            'nombre_completo' => 'required',
            'user' => 'required|max:255|unique:users',
            'password' => 'required|max:255',
            'puesto_empleado' => 'required'
        ]);

        $user = new User();
        $user->nombre = $request->input('nombre_completo');
        $user->user = $request->input('user');
        $user->puesto_empleado = $request->input('puesto_empleado');
        $user->password = Hash::make($request->input('password'));
        $user->estado = true;

        $user->save();

        if($request->puesto_empleado == 3){
            $supervisor = user::where('puesto_empleado', 1)->first()->value('id');
            $asesor = new asesores();

            $asesor->id_administrativo = administrativos::where('id_user', $supervisor)->value('id');
            $asesor->incubadora = true;            
            $asesor->id_user = $user->id;

            $asesor->save();
        }elseif($request->puesto_empleado == 6){

        }

        return view("message", ['msg' => "Usuario guardado"]);
        return("administrativo");
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }

    //public function logout(){
    //    return 'Hola';
    //}

}
