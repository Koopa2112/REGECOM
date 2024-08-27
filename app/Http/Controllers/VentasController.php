<?php

namespace App\Http\Controllers;

use App\Models\analistas;
use App\Models\administrativos;
use App\Models\ventas;
use App\Models\User;
use App\Models\rutas;
use App\Models\zonas;
use App\Models\asesores;
use App\Models\equipos;
use App\Models\acuses;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VentasController extends Controller
{

    public function curso()
    {
        $user = auth()->user();
        $userID = $user->id;
        $asesor = asesores::where('id_user', $userID)->first();
        $asesorID = $asesor->id;
        $ventasCurso = ventas::where('id_asesor', $asesorID)->whereIn('estado_venta', [0,1,2,3,4,5,6,7,8])->orderBy('id', 'desc')->get();
        return view('ventas.curso', ['ventas' => $ventasCurso]);
    }

    public function fecha($id){
        $userId = auth()->user()->id;
        $asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
        $venta = ventas::find($id);
        if($venta->id_asesor == $asesorId && $venta->estado_venta != 10){

            $zonaVenta = ventas::where('id', $id)->pluck('id_zona')->first();
            $hoy = today(('America/Mexico_City'));
            $fechas_disponibles = rutas::where('id_zona', $zonaVenta)
                ->where('fecha_entrega', '>=', $hoy)
                ->where('num_entregas', '<', rutas::raw('max_entregas'))->get();
            return view('ventas.fecha', ['venta' => $id, 'fechas_entrega' => $fechas_disponibles]);
            
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
        /*
        $zonaVenta = ventas::where('id', $id)->pluck('id_zona')->first();
        $fechas_disponibles = rutas::where('id_zona', $zonaVenta)->get();
        return view('ventas.fecha', ['venta' => $id, 'fechas_entrega' => $fechas_disponibles]); */
    }

    public function saveDate(Request $request, $id){
        $request->validate([
            'fecha_entrega' => 'required',                       
        ]);
        $ruta = rutas::find($request->input('fecha_entrega'));
        if($ruta->num_entregas < $ruta->max_entregas){
            $venta = ventas::find($id);
            $venta->estado_venta = (6); 
            
            $venta->id_ruta = $request->input('fecha_entrega');

            $venta->save();


            $ruta->num_entregas++;
            $ruta->save();
            return view("message", ['msg' => "Fecha guardada"]);
        }
        else{
            return view("message", ['msg' => "No se ha podido guardar, límite de entregas alcanzado :o"]);
        }
    }

    public function cancel($id){
        $userId = auth()->user()->id;
        $asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
        $venta = ventas::find($id);
        if($venta->id_asesor == $asesorId){
            $venta->estado_venta = 10;
            $venta->save();
            return view("message", ['msg' => "La venta ha sido cancelada =("]);
            
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }


    }

    
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
        
        $asesorID = $asesor->id;

        $ultimaVenta = ventas::get()->last();
        
        
        // Obtener la lista de analistas disponibles
        $analistasU = User::where('puesto_empleado', 6)->where('estado', true)->pluck('id');

        //tengo la colección con los id

        $n = 0;

        $id_analistas = analistas::whereIn('id_user', $analistasU)->get()->pluck('id');
        $id_analistasArray = $id_analistas->all();
        if($ultimaVenta == null){
            $ultimoAnalistaUsado = null;
        }else{                              //ver si hay una venta, si no por defecto poner a analista 1
            $ultimoAnalistaUsado = $ultimaVenta->id_analista;
        }      

        if ($ultimoAnalistaUsado == null || $ultimoAnalistaUsado == $id_analistas->last()){
            // Si el último analista no se encuentra o es el último de la lista, selecciona el primeros
            $analistaAsignado = reset($id_analistasArray);
        } else {
            // Selecciona el siguiente analista en la lista

            $key = array_search($ultimoAnalistaUsado, $id_analistasArray);
            if ($key !== false && isset($id_analistasArray[$key + 1])) {
                $analistaAsignado = $id_analistasArray[$key + 1];
            }
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
            'url_maps' => 'required|url',
            'total_mensual' => 'required',
            'notas_vendedor' => 'required',
            'notas_MC' => 'nullable',
            'id_zona' => 'nullable|int',
                        
        ]);
        $total_mensual = $request->input('total_mensual');

        $total_mensual_formateado = intval(str_replace(',','', $total_mensual));

        $venta = new ventas();
        $venta->id_asesor = $asesorID;
        if($asesor->incubadora === 1){
            $venta->estado_venta = (0); 
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
        $venta->colonia_entrega = $request->input('colonia_entrega');
        $venta->referencia_entrega = $request->input('referencia_entrega');
        $venta->url_maps = $request->input('url_maps');
        $venta->total_mensual = $total_mensual_formateado;
        $venta->notas_vendedor = $request->input('notas_vendedor');
        $venta->notas_MC = $request->input('notas_MC');
        $venta->id_zona = $request->input('id_zona');
        $venta->fecha_venta = now(('America/Mexico_City'));
        $venta->save();

        return view("message", ['msg' => "Registro guardado =D"]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = auth()->user();
        $userId = $user->id;
        $asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
        $venta = ventas::find($id);
        $zona = zonas::find($venta->id_zona);
        if($venta->id_asesor == $asesorId || $user->puesto_empleado == 0){
            $total_mensual = $venta->total_mensual;
            $totalFormateado = '$ '.number_format($total_mensual, 0, ',');
            return view('ventas.show', ['venta' => $venta, 'zona' => $zona, 'total_mensual' => $totalFormateado] ); 
            
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
        
    }

    public function sshow($id)
    {

        $user = auth()->user();
        $userId = $user->id;
        //$asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
        $venta = ventas::find($id);
        $zona = zonas::find($venta->id_zona);
        if($user->puesto_empleado == 1){
            $total_mensual = $venta->total_mensual;
            $totalFormateado = '$ '.number_format($total_mensual, 0, ',');
            return view('ventas.sshow', ['venta' => $venta, 'zona' => $zona, 'total_mensual' => $totalFormateado] ); 
            
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
        
    }

    public function cshow($id)
    {
        $user = auth()->user();
        $userId = $user->id;
        //$asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
        $venta = ventas::find($id);
        $zona = zonas::find($venta->id_zona);
        if($user->puesto_empleado == 2){
            $total_mensual = $venta->total_mensual;
            $totalFormateado = '$ '.number_format($total_mensual, 0, ',');
            return view('ventas.cshow', ['venta' => $venta, 'zona' => $zona, 'total_mensual' => $totalFormateado] );  
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    public function ashow($id)
    {
        $user = auth()->user();
        $userId = $user->id;
        //$asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
        $venta = ventas::find($id);
        $zona = zonas::find($venta->id_zona);
        if($user->puesto_empleado == 6){
            $total_mensual = $venta->total_mensual;
            $totalFormateado = '$ '.number_format($total_mensual, 0, ',');
            return view('ventas.ashow', ['venta' => $venta, 'zona' => $zona, 'total_mensual' => $totalFormateado] );       
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    public function lshow($id)
    {
        $user = auth()->user();
        $userId = $user->id;
        //$asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
        $venta = ventas::find($id);
        $zona = zonas::find($venta->id_zona);
        if($user->puesto_empleado == 4){
            $total_mensual = $venta->total_mensual;
            $totalFormateado = '$ '.number_format($total_mensual, 0, ',');
            return view('ventas.lshow', ['venta' => $venta, 'zona' => $zona, 'total_mensual' => $totalFormateado] );  
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }
    

    public function aceptar($id){

        if(auth()->user()->puesto_empleado == 2){
            $venta = ventas::find($id);
            $venta->estado_venta = 2;
            $venta->save();
            return view("message", ['msg' => "Venta aceptada"]);
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }

    }

    public function rechazar($id){

        if(auth()->user()->puesto_empleado == 2){
            $venta = ventas::find($id);
            $venta->estado_venta = 1;
            $venta->save();
            return view("message", ['msg' => "Venta rechazada"]);
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }

    }

    public function analisis(request $request, $id){
        $request->validate([
            'notas_MC' => 'required',
            'estado' => 'required',
        ]);

        if(auth()->user()->puesto_empleado == 6){
            $venta = ventas::find($id);
            $venta->notas_MC = $request->input('notas_MC');
            $venta->estado_venta = intval($request->input('estado'));
            $venta->save();
            if($venta->estado_venta == 5){
                return view("message", ['msg' => "Tramite mandado a proceso ;D"]);
            }elseif($venta->estado_venta == 3){
                return view("message", ['msg' => "Venta con problema :`("]);
            }elseif($venta->estado_venta == 7){
                $request->validate([
                    'imei' => 'required'
                ]);
                if(null != ($request->input('imei'))){
                    // $venta->id_equipo = intval($request->input('id_equipo'), 10);
                    // $equipo = equipos::find($venta->id_equipo);
                    // $equipo->entregado = true;
                    $equipo = new equipos();
                    $equipo->imei = $request->input('imei');
                    $equipo->marca_equipo = "null";
                    $equipo->modelo_equipo = 'null';
                    $equipo->save();
                    $venta->id_equipo = $equipo->id;
                    $venta->save();
                    return view("message", ['msg' => "Venta lista para entregarse :D"]);
                }
            }


        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {  
            $user = auth()->user();
            $userId = $user->id;
            $asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
            $venta = ventas::find($id);
            $zona = zonas::find($venta->id_zona);
            if($venta->id_asesor == $asesorId ){
                $total_mensual = $venta->total_mensual;
                $totalFormateado = '$ '.number_format($total_mensual, 0, ',');
                return view('ventas.edit', ['venta' => $venta, 'zona' => $zona, 'total_mensual' => $totalFormateado] ); 
            }else{
                return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
            }        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){   
        $user = auth()->user();
        $asesor = asesores::where('id_user', $user->id)->first();
        $request->validate([
            'linea_venta' => 'required',
            'nombre_cliente' => 'required',
            'plan_venta' => 'required',
            'meses_venta' => 'required',
            'marca_equipo' => 'required',
            'modelo_equipo' => 'required',

            'calle_entrega' => 'required',
            'numero_entrega' => 'required',
            'colonia_entrega' => 'required',
            'referencia_entrega' => 'required',
            'municipio_entrega' => 'required',
            'url_maps' => 'required|url',
            'total_mensual' => 'required',
            'notas_vendedor' => 'required',
                        
        ]);

        $venta = ventas::find($id);
        if($venta->estado_venta == 1 || $venta->estado_venta == 3){
            if($asesor->incubadora === 1){
                $venta->estado_venta = (0); 
            }else{
                $venta->estado_venta = (2); 
            }
        }
        $total_mensual = $request->input('total_mensual');
        $total_mensual_formateado = intval(str_replace(',','', $total_mensual));

        $venta->linea_venta = $request->input('linea_venta');
        $venta->nombre_cliente = $request->input('nombre_cliente');
        $venta->plan_venta = $request->input('plan_venta');
        $venta->meses_venta = $request->input('meses_venta');
        $venta->marca_equipo = $request->input('marca_equipo');
        $venta->modelo_equipo = $request->input('modelo_equipo');

        /////////////////////////////////////////////////////////////////////////// Si cambio cualquier cosa de la dirección
        $cambioCalle = $venta->calle_entrega !== $request->input('calle_entrega');
        $cambioNumero = $venta->numero_entrega !== $request->input('numero_entrega');
        $cambioMunicipio = $venta->municipio_entrega !== $request->input('municipio_entrega');
        $cambioColonia = $venta->colonia_entrega !== $request->input('colonia_entrega');
        $cambioReferencia = $venta->referencia_entrega !== $request->input('referencia_entrega');
        $cambioMaps = $venta->referenurl_mapscia_entrega !== $request->input('url_maps');

        if($cambioCalle || $cambioNumero || $cambioMunicipio || $cambioColonia || $cambioReferencia || $cambioMaps ){
            $venta->calle_entrega = $request->input('calle_entrega');
            $venta->numero_entrega = $request->input('numero_entrega');
            $venta->municipio_entrega = $request->input('municipio_entrega');
            $venta->colonia_entrega = $request->input('colonia_entrega');
            $venta->referencia_entrega = $request->input('referencia_entrega');
            $venta->url_maps = $request->input('url_maps');
            if($venta->estado_venta != 0 && $venta->estado_venta != 1 && $venta->estado_venta != 2 && $venta->estado_venta != 3){
                $venta->estado_venta = 5;   
            }
        }

        ////////////////////////////////////////////////////////////////////////////// Regresa la venta a asignar zona
        $venta->total_mensual = $total_mensual_formateado;
        $venta->notas_vendedor = $request->input('notas_vendedor');
        $venta->notas_MC = $request->input('notas_MC');
        
        //$venta->fecha_venta = now(('America/Mexico_City'));
        $venta->save();

        return view("message", ['msg' => "Registro reenviado =D"]);
    }

    public function reenviar(Request $request, $id)
    {
        $venta = ventas::find($id);

        return view('ventas.reenviar', ['venta' => $venta]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ventas $ventas)
    {
        //
    }

    public function terminadas()
    {
        $user = auth()->user();
        $userID = $user->id;
        $asesor = asesores::where('id_user', $userID)->first();
        $asesorID = $asesor->id;
        $terminadas = ventas::where('id_asesor', $asesorID)->whereIn('estado_venta', [9,10,11])->orderBy('id', 'desc')->get();
        $acuses = acuses::where('fecha_sellado', '!=', null)->get();
        return view('ventas.terminadas', ['ventas' => $terminadas, 'acuses' => $acuses]);
    }

    public function dia(){
        $user = auth()->user();
        if($user->puesto_empleado == 1){
            $supervisor = administrativos::where('id_user', $user->id)->get()->first();
            $supervisorId = $supervisor->id;
            $asesores = asesores::where('id_administrativo', $supervisorId)->get()->pluck('id');
            $hoy = now(('America/Mexico_City'))->format('Y-m-d');
            $ventas = ventas::whereIn('id_asesor', $asesores)->where('fecha_venta', $hoy)->get();
            return view('ventas.dia', ['ventas' => $ventas, 'asesores' => $asesores]);
        }else if($user->puesto_empleado == 0){
            $hoy = now(('America/Mexico_City'))->format('Y-m-d');
            $ventas = ventas::where('fecha_venta', $hoy)->get();
            $asesores = asesores::all();
            return view('ventas.dia', ['ventas' => $ventas, 'asesores' => $asesores]);
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }

    }

    public function mes(){
        $user = auth()->user();
        if($user->puesto_empleado == 1){
            $supervisor = administrativos::where('id_user', $user->id)->get()->first();
            $supervisorId = $supervisor->id;
            $asesores = asesores::where('id_administrativo', $supervisorId)->get()->pluck('id');
            $fecha_hace_30_dias = Carbon::now()->subDays(30);
            $ventas = ventas::whereIn('id_asesor', $asesores)
                ->whereDate('fecha_venta', '>=', $fecha_hace_30_dias)
                ->get();
            $asesores = asesores::all();
            $zonas = zonas::all();
            return view('ventas.mes', ['ventas' => $ventas, 'asesores' => $asesores, 'zonas' => $zonas]);
        }else if($user->puesto_empleado == 0){
            $fecha_hace_30_dias = Carbon::now()->subDays(30);
            $ventas = ventas::whereDate('fecha_venta', '>=', $fecha_hace_30_dias)
                ->get();
            $asesores = asesores::all();
            return view('ventas.mes', ['ventas' => $ventas, 'asesores' => $asesores]);
        }
        else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }

    }

    public function pendienteRevision(){

        if(auth()->user()->puesto_empleado == 2){
            $ventas = ventas::where('estado_venta', 0)->get();
            return view("ventas.pendienteRevision", ['ventas' => $ventas]);
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }

    }

    public function pendienteAnalisis(){
        $user = auth()->user();
        $analista = analistas::where('id_user', $user->id)->first();
        if($user->puesto_empleado == 6){
            $ventas = ventas::where('estado_venta', 2)->where('id_analista', $analista->id)->get();
            return view("ventas.pendienteAnalisis", ['ventas' => $ventas]);
            
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }

    }

    public function conRuta(){
        $user = auth()->user();
        $analista = analistas::where('id_user', $user->id)->get()->first();
        if($user->puesto_empleado == 6){
            $ventas = ventas::where('estado_venta', 6)->where('id_analista', $analista->id)->orderBy('id_ruta', 'desc')->get();
            $zonas = zonas::where('isActive', '1')->get();
            return view("ventas.conRuta", ['ventas' => $ventas, 'zonas' => $zonas]);
            
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }

    }

    public function contrato($id){
        $user = auth()->user();
        $userId = $user->id;
        //$asesorId = asesores::where('id_user', $userId)->pluck('id')->first();
        $venta = ventas::find($id);
        $zona = zonas::find($venta->id_zona);
        if($user->puesto_empleado == 6){
            $total_mensual = $venta->total_mensual;
            $equipos = equipos::where('entregado', false)->get();
            $totalFormateado = '$ '.number_format($total_mensual, 0, ',');
            return view('ventas.contrato', ['venta' => $venta, 'zona' => $zona, 'total_mensual' => $totalFormateado, 'equipos' => $equipos] );      
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    public function entregadas(){
        $user = auth()->user();
        $analista = analistas::where('id_user', $user->id)->get()->first();
        if($user->puesto_empleado == 6){
            
            $ventas = ventas::where('estado_venta', 8)->where('id_analista', $analista->id)->get();

            return view("ventas.entregadas", ['ventas' => $ventas]);
            
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    private function acuseFinal(){
        $ultimoAcuse = acuses::get()->last();
        $totalVentasAcuse = ventas::where('id_acuse', '=' , $ultimoAcuse->id)->count();
        if($totalVentasAcuse < 25 && $ultimoAcuse->cerrado == 0){
            if($totalVentasAcuse == 24){
                $ultimoAcuse->cerrado = 1;
            }
            return($ultimoAcuse->id);
        }else{
            if($ultimoAcuse->cerrado == 0){
                $ultimoAcuse->cerrado = 1;
                $ultimoAcuse->save();
            }
            $acuseNuevo = new acuses();
            $acuseNuevo->fecha_creado = today();
            $acuseNuevo->save();
            return($acuseNuevo->id);
        }
        return(-1000);
    }

    public function finalizar(request $request, $id){
        if(auth()->user()->puesto_empleado == 6){
            $request->validate([
                'repartidor' => 'required',
            ]);
            $venta = ventas::find($id);
            $venta->estado_venta = 9;
            $venta->repartidor = $request->repartidor;
            $venta->id_acuse = $this->acuseFinal();
            $venta->save();
            return redirect()->back();
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    public function pendienteZona(){
        $puesto = auth()->user()->puesto_empleado;
        if($puesto == 4 || $puesto == 1){
            $ventas = ventas::where('estado_venta', 5)->get();
 
            return view("ventas.pendienteZona", ['ventas' => $ventas]);
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    public function asignarZona($id){
        $puesto = auth()->user()->puesto_empleado;
        if($puesto == 4 || $puesto == 1){
            $venta = ventas::find($id);
            if($venta->estado_venta == 5){
                $zonas = zonas::where('isActive', 1)->get();
                return view("ventas.asignarZona", ['venta' => $venta, 'zonas' => $zonas, ]);
            }else{
                header("Location: /REGECOM/public/ventas/pendienteZona");
                exit();
            }
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    public function zonaAsignada(request $request, $id){
        $puesto = auth()->user()->puesto_empleado;
            if($puesto == 4 || $puesto == 1){
                //return($request);
                $request->validate([
                    'id_zona' => 'required'
                ]);
                $venta = ventas::find($id);
                $venta->estado_venta = 4;
                $venta->id_zona = intval($request->input('id_zona'), 10);
                $venta->save();
                return view("message", ['msg' => "Zona guardada correctamente (="]);
            }else{
                return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
            }
    }

    public function enviadas(){
        if(auth()->user()->puesto_empleado == 4){
            $ventas = ventas::where('estado_venta', 7)
            ->join('rutas', 'ventas.id_ruta', '=', 'rutas.id')
            ->select('ventas.*', 'rutas.fecha_entrega')
            ->orderBy('rutas.fecha_entrega', 'asc')
            ->get();
            return view('ventas.enviadas', ['ventas' => $ventas]);
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    public function envio(request $request, $id){
        if(auth()->user()->puesto_empleado == 4){
            $venta = ventas::find($id);
            $venta->estado_venta = intval($request->input('estado_venta'), 10);
            if(intval($request->input('estado_venta'), 10) == 4) {
                $request->validate([
                    'comentario' => 'required',
                ]);
                $venta->notas_MC = trim('COMENTARIO DE LOGISTICA-->' . $request->input('comentario') . '///' . $venta->notas_MC);
            }
            $venta->save();
            return back();
        }else{
            return view("message", ['msg' => "No tienes permiso para hacer esto >:("]);
        }
    }

    public function checkLine(Request $request)
    {
        $numeroLinea = $request->input('linea_venta');
        $oneYearAgo = Carbon::now()->subYear();

        $exists = ventas::where('linea_venta', $numeroLinea)
                      ->where('created_at', '>=', $oneYearAgo)
                      ->exists();
        if ($exists) {
            $venta = ventas::where('linea_venta', $numeroLinea)->pluck('fecha_venta')->first();
            $id = ventas::where('linea_venta', $numeroLinea)->pluck('id')->first();
        }else{
            $venta = null;
            $id = null;
        }
        return response()->json(['exists' => $exists, 'venta' => $venta, 'id' => $id]);
    }

    public function busqueda(Request $request){
        $request->validate([
            'busqueda' => 'required', 
        ]);
        $termino = $request->input('busqueda');
        
        // Realiza la búsqueda en la base de datos
        $resultados = ventas::where('linea_venta', 'LIKE', "%{$termino}%")
                            ->orWhere('nombre_cliente', 'LIKE', "%{$termino}%")
                            ->orWhere('id', 'LIKE', "%{$termino}%")
                            ->get();
        
        // Retorna los resultados a una vista
        //return($resultados);
        return view('ventas.busqueda', ['ventas' => $resultados]);

    }
    
}