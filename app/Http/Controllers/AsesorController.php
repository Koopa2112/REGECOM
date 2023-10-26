<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;

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
            'nombre_empleado' => 'required|max:255',
            'password' => 'required|max:255',
            
        ]);

        $asesor = new Asesor();
        $asesor->nombre_completo = $request->input('nombre_completo');
        $asesor->nombre_empleado = $request->input('nombre_empleado');
        $asesor->password = $request->input('password');
        $asesor->incubadora = $request->input('incubadora');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asesor $asesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asesor $asesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asesor $asesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asesor $asesor)
    {
        //
    }
}
