<?php

namespace App\Http\Controllers;

use App\Models\equipos;
use App\Models\ventas;
use Illuminate\Http\Request;

class EquipoController extends Controller
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
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(auth()->user()->puesto_empleado = 5){
            $request->validate([
                'marca' => 'required',
                'modelo' => 'required',
                'imeis' => 'required'
            ]);
            $imeis = explode(",", $request->input('imeis'));
            foreach($imeis as $imei){
                $equipo = new equipos();
                $equipo->marca_equipo =  $request->input('marca');
                $equipo->modelo_equipo =  $request->input('modelo');
                $equipo->imei =  $imei;
                $equipo->save();
            }
            //return(equipos::all());
            return view("message", ['msg' => "Equipo(s) guardados 8)"]);
        }else{
            return view("message", ['msg' => "No debes estar aqui"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    
        if(auth()->user()->puesto_empleado = 5){
            $equipo = equipos::find($id);
            return view('equipos.edit', ['equipo' => $equipo]);
        }else{
            return view("message", ['msg' => "No debes estar aqui"]);
        }
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, $id)
    {
        if(auth()->user()->puesto_empleado = 5){
            $request->validate([
                'marca' => 'required',
                'modelo' => 'required',
                'imei' => 'required'
            ]);
                $equipo = equipos::find($id);
                $equipo->marca_equipo = $request->input('marca');
                $equipo->modelo_equipo = $request->input('modelo');
                $equipo->imei = $request->input('imei');
                $equipo->save();
            return view('message', ['msg' => "Equipo actualizado"]);
        }else{
            return view("message", ['msg' => "No debes estar aqui"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(equipos $equipos)
    {
        //
    }

    public function asignados()
    {
        if(auth()->user()->puesto_empleado = 5){
            $equipos = equipos::where('entregado', 1)->get();
            $ventas = ventas::whereIn('estado_venta', [7, 8, 9 ,10])->get();
            $lineas = $ventas->pluck('linea_venta');
            return view('equipos.asignados', ['equipos' => $equipos, 'lineas' => $ventas]);
        }else{
            return view("message", ['msg' => "No debes estar aqui"]);
        }
    }

    public function inventario()
    {
        if(auth()->user()->puesto_empleado = 5){
            $equipos = equipos::where('entregado', 0)->get();
            return view('equipos.inventario', ['equipos' => $equipos]);
        }else{
            return view("message", ['msg' => "No debes estar aqui"]);
        }
    }
}