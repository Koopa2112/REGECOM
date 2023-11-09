<?php

namespace App\Http\Controllers;

use App\Models\Asesores;
use App\Models\User;
use App\Models\administrativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('asesores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asesores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'user' => 'required|max:255|unique:users',
            'password' => 'required|max:255',
            
        ]);


        $user = auth()->user();
        $userID = $user->id;
        $supervisor = administrativos::where('id_user', $userID)->first();
        //return($supervisor);
        $supervisorID = $supervisor->id;
        
        $user = new User();
        $user->nombre = $request->input('nombre_completo');
        $user->user = $request->input('user');
        $user->puesto_empleado = 3;
        $user->password = Hash::make($request->input('password'));
        $user->estado = true;
        //return($user);
        $user->save();

        $asesor = new Asesores();
        $asesor->id_administrativo = $supervisorID;
        $asesor->incubadora = request()->filled('incubadora');
        
        $asesor->id_user = $user->id;
        $asesor->updated_at = null;
        $asesor->created_at = null;
        $asesor->save();

        return view("message", ['msg' => "Asesor guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asesores $asesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asesores $asesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asesores $asesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asesores $asesor)
    {
        //
    }
}
