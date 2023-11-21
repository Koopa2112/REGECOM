<?php

namespace App\Http\Controllers;

use App\Models\zonas;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   if(auth()->user()->puesto_empleado == 4){
            $zonas = zonas::all();
            return view('zonas.index', ['zonas' => $zonas]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zonas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(auth()->user()->puesto_empleado == 4){
            $request->validate([
                'nombre_zona' => 'required',

            ]);
            $zona = new zonas();
            $zona->nombre_zona = $request->input('nombre_zona');
            $zona->save();
            return view('message', ['msg' => "Zona agregada correctamente =)"]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(zonas $zonas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   if(auth()->user()->puesto_empleado == 4){
            $zona = zonas::find($id);
            return view('zonas.edit', ['zona' => $zona]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->puesto_empleado == 4){
            $request->validate([
                'nombre_zona' => 'required',

            ]);
            $zona = zonas::find($id);
            $zona->nombre_zona = $request->input('nombre_zona');
            $zona->save();
            return view('message', ['msg' => "Zona editada correctamente =)"]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(zonas $zonas)
    {
        //
    }
}
