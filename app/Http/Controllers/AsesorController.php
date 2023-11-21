<?php

namespace App\Http\Controllers;

use App\Models\asesores;
use App\Models\User;
use App\Models\administrativos;
use App\Models\ventas;
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

        $asesor = new asesores();
        $asesor->id_administrativo = $supervisorID;
        $asesor->incubadora = $request->has('incubadora');
        
        $asesor->id_user = $user->id;
        $asesor->updated_at = null;
        $asesor->created_at = null;
        $asesor->save();

        return view("message", ['msg' => "Asesor guardado"]);
    }

    public function lista(){
        $user = auth()->user();
        if($user->puesto_empleado = 1){
            $userId = $user->id;
            $supervisor = administrativos::where('id_user', $userId)->first();
            $asesores = asesores::where('id_administrativo', $supervisor->id)->get();
            $asesoresId = $asesores->pluck('id');
            $asesoresUsuarios = User::whereIn('id', $asesoresId)->get();
            $hoy = now(('America/Mexico_City'))->format('Y-m-d');
            $ventas = ventas::where('fecha_venta', $hoy)->pluck('id_asesor');
            $conteo = $ventas->countBy(function ($item) {
                return $item;
            });
            //return($asesores);

            return view("asesores.lista", ['conteo' => $conteo, 'asesores'=> $asesores]);
        }else{
            return view("message", ['msg' => "No debes estar aqui"]);
        }
        

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
    public function edit($id)
    {
        $asesor = asesores::find($id);

        return view('asesores.edit', ['asesor' => $asesor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre_completo' => 'required',
            'user' => 'required|max:255|unique:users,user,' . $id,
            'password' => 'max:255',
            
        ]);
        
        //$userId = asesores::where('id_user', $id)->pluck('id')->first();
        
        $user = User::find($id);
        
        $user->nombre = $request->input('nombre_completo');
        $user->user = $request->input('user');
        if($request->input('password') != null){
            $user->password = Hash::make($request->input('password'));
        }
        $user->estado = $request->has('estado');

        $user->save();
        
        $asesorB = asesores::where('id_user', $id)->first();
        $asesor = asesores::find($asesorB->id);
        $asesor->incubadora = $request->has('incubadora');
        $asesor->save();

        return view("message", ['msg' => "Asesor actualizado correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asesores $asesor)
    {
        //
    }
}
