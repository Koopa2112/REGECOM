<?php

namespace App\Http\Controllers;

use App\Models\analistas;
use App\Models\ventas;
use App\Models\User;
use App\Models\asesores;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ventas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = auth()->user();
        $userID = $user->id;
        $asesor = asesores::where('id_user', $userID)->first();
        //return($asesor);
        $asesorID = $asesor->id;

        $ultimaVenta = ventas::latest()->first();
        
        
        
    // Obtener la lista de analistas disponibles
        $analistasU = User::where('puesto_empleado', 6)->where('estado', true)->pluck('id');
        //return($analistasU);  //tengo la colección con los id
        $id_analistas = [];
        $n = 0;
        foreach($analistasU as $id_user){       //busco en cada uno de los analistas, si conocide con los id activos
            $id_analistas[$n] = analistas::where('id_user', $id_user)->pluck('id');
            $n++;
        }
        //return($id_analistas);
        
        //$analistas = analistas::where('id_user', $analistasU)->get()->id;
        
        if($ultimaVenta == null){
            $ultimoAnalistaUsado = 1;
        }else{                              //ver si hay una venta, si no por defecto poner a analista 1
            $ultimoAnalistaUsado = $ultimaVenta->id_analista;
        }      
        //return(last($id_analistas)->last());
    // Encontrar el siguiente analista en el ciclo de round-robin
        //$siguienteAnalista = $this->encontrarSiguienteAnalista($id_analistas, $ultimoAnalista);
        if ($ultimoAnalistaUsado == false || $ultimoAnalistaUsado == last($id_analistas)->last()){
            // Si el último analista no se encuentra o es el último de la lista, selecciona el primero
            $analistaAsignado = $id_analistas[0]->first();
            
        } else {
            // Selecciona el siguiente analista en la lista
            $analistaAsignado = ($ultimoAnalistaUsado + 1);
        }
                
        $request->validate([
            'linea_venta' => 'required',
            'nombre_cliente' => 'required',
            'plan_venta' => 'required',
            'meses_venta' => 'required',
            'marca_equipo' => 'required',
            'modelo_equipo' => 'required',
            'id_equipo' => 'nullable|int',
            'id_ruta' => 'nullable|int',
            'calle_entrega' => 'required',
            'numero_entrega' => 'required',
            'colonia_entrega' => 'required',
            'referencia_entrega' => 'required',
            'municipio_entrega' => 'required',
            'url_maps' => 'required',
            'total_mensual' => 'required',
            'notas_vendedor' => 'nullable',
            'notas_MC' => 'nullable',
            'id_zona' => 'nullable|int',
                        
        ]);

        $venta = new ventas();
        $venta->id_asesor = $asesorID;
        if($asesor->incubadora === true){
            $venta->estado_venta = (1); 
        }else{
            $venta->estado_venta = (2); 
        }
        

        $venta->id_analista = $analistaAsignado;
        $venta->linea_venta = $request->input('linea_venta');
        $venta->nombre_cliente = $request->input('nombre_cliente');
        $venta->plan_venta = $request->input('plan_venta');
        $venta->meses_venta = $request->input('meses_venta');
        $venta->marca_equipo = $request->input('marca_equipo');
        $venta->modelo_equipo = $request->input('modelo_equipo');
        $venta->id_ruta = $request->input('id_ruta');
        $venta->calle_entrega = $request->input('calle_entrega');
        $venta->numero_entrega = $request->input('numero_entrega');
        $venta->municipio_entrega = $request->input('municipio_entrega');
        $venta->colonia_entrega = $request->input('municipio_entrega');
        $venta->referencia_entrega = $request->input('municipio_entrega');
        $venta->url_maps = $request->input('url_maps');
        $venta->total_mensual = $request->input('total_mensual');
        $venta->notas_vendedor = $request->input('notas_vendedor');
        $venta->notas_MC = $request->input('notas_MC');
        $venta->id_zona = $request->input('id_zona');
        $venta->fecha_venta = now();

        $venta->save();

        return view("message", ['msg' => "Registro guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ventas $ventas)
    {
        //
    }



}

