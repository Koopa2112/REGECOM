<?php

namespace App\Http\Controllers;

use App\Models\rutas;
use App\Models\zonas;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $rutas = rutas::all();
        return view('rutas.index',[ 'rutas' => $rutas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $zonas = zonas::all();
        return view('rutas.create', ['zonas' => $zonas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(auth()->user()->puesto_empleado == 4){
            $request->validate([
                'max_entregas' => 'required',
                'id_zona' => 'required',
                'fecha_entrega' => 'required'
            ]);
            $ruta = new rutas();
            $ruta->max_entregas = $request->input('max_entregas');
            $ruta->num_entregas = 0;
            $ruta->id_zona = $request->input('id_zona');
            $ruta->fecha_entrega = $request->input('fecha_entrega');
            $ruta->save();
            return view('message', ['msg' => "Ruta agregada correctamente =)"]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(rutas $rutas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ruta = rutas::find($id);
        $zonas = zonas::all();
        return view('rutas.edit', ['ruta' => $ruta, 'zonas' => $zonas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        if(auth()->user()->puesto_empleado == 4){
            $request->validate([
                'max_entregas' => 'required',
                'id_zona' => 'required',
                'fecha_entrega' => 'required'
            ]);
            $ruta = rutas::find($id);
            $ruta->max_entregas = $request->input('max_entregas');
            $ruta->id_zona = $request->input('id_zona');
            $ruta->fecha_entrega = $request->input('fecha_entrega');
            
            $ruta->save();
            return view('message', ['msg' => "Ruta editada correctamente =)"]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rutas $rutas)
    {
        //
    }
}
