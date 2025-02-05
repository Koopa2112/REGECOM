<?php

namespace App\Http\Controllers;

use App\Models\rutas;
use App\Models\User;
use App\Models\zonas;
use App\Models\ventas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $puesto = auth()->user()->puesto_empleado;
        if($puesto == 4 || $puesto == 1 || $puesto == 0 || $puesto == 7){
            $tresDiasAtras = Carbon::today(('America/Mexico_City'))->subDay(3);
            $rutas = rutas::where('fecha_entrega', '>=', $tresDiasAtras)->orderBy('id','DESC')->get();
            foreach($rutas as $ruta){
                $ruta->num_entregas = ventas::where('id_ruta' , '=', $ruta->id)
                                                ->where('estado_venta', '>=', 6)
                                                ->count();
            }
            return view('rutas.index',[ 'rutas' => $rutas]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $puesto = auth()->user()->puesto_empleado;
        if($puesto == 4 || $puesto == 0 || $puesto == 7){
            $zonas = zonas::where('isActive', '=', 1)->get();
            $repartidores = User::where('puesto_empleado', '=', 7)->get()->map(function ($user) {
                return (object) ['id' => $user->id, 'user' => $user->user];
            });
            return view('rutas.create', ['zonas' => $zonas, 'repartidores' => $repartidores]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $puesto = auth()->user()->puesto_empleado;
        if($puesto == 4 || $puesto == 0 || $puesto == 7){
            $request->validate([
                'max_entregas' => 'required',
                'id_zona' => 'required',
                'id_repartidor' => 'required',
                'fecha_entrega' => 'required',
            ]);
            $ruta = new rutas();
            $ruta->max_entregas = $request->input('max_entregas');
            $ruta->num_entregas = 0;
            $ruta->id_zona = $request->input('id_zona');
            $ruta->id_repartidor = $request->input('id_repartidor');
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
        $puesto = auth()->user()->puesto_empleado;
        if( $puesto == 4 || $puesto == 0 || $puesto == 7){
            $ruta = rutas::find($id);
            $zonas = zonas::all();
            $repartidores = User::where('puesto_empleado', '=', 7)->get()->map(function ($user) {
                return (object) ['id' => $user->id, 'user' => $user->user];
            });
            return view('rutas.edit', ['ruta' => $ruta, 'zonas' => $zonas, 'repartidores' => $repartidores]);
        }else{
            return view('message', ['msg' => "No tienes permiso de estar aqui >:("]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {      
        $puesto = auth()->user()->puesto_empleado;
        if($puesto == 4 || $puesto == 0 || $puesto == 7){
            $request->validate([
                'max_entregas' => 'required',
                'id_zona' => 'required',
                'id_repartidor' => 'required',
                'fecha_entrega' => 'required'
            ]);
            $ruta = rutas::find($id);
            $ruta->max_entregas = $request->input('max_entregas');
            $ruta->id_zona = $request->input('id_zona');
            $ruta->id_repartidor = $request->input('id_repartidor');
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
