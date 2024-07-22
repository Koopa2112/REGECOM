<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\acuses;
use App\Models\ventas;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Carbon\Carbon;

class AcuseController extends Controller
{
    public function index()
    {
        $tiempoMaximo = today()->subDays(90);
        $acuses = acuses::where('fecha_creado', '>=', $tiempoMaximo)
            ->withCount('ventas')
            ->get()
            ->sortByDesc('id');
        foreach($acuses as $acuse){
            if($acuse->fecha_sellado != null){
                $acuse->fecha_sellado = Carbon::parse($acuse->fecha_sellado)->format('d-M-Y');
            }
            $acuse->fecha_creado = Carbon::parse($acuse->fecha_creado)->format('d-M-Y');
        }
        return view('acuses.index', ['acuses' => $acuses]);
    }

    public function view($id)
    {
        $ventas = ventas::where('id_acuse', '=', $id)
            ->with('asesor.user')
            ->get();
        return view('acuses.view', ['ventas' => $ventas, 'id' => $id]);
    }

    /*public function store(Request $request)
    {
        $request->validate([
            'fecha_acuse' => 'required',
        ]);
        $acuse = new acuses();
        $acuse->fecha_acuse = $request->fecha_acuse;
        $acuse->save();
        return ($this->index());
    }*/

    public function comisiones()
    {
        return view('acuses.comisiones');
    }

    public function dwlComisiones(Request $request)
    {
        return ($request);
    }

    public function cerrar($id)
    {
        $acuse = acuses::find($id);
        $acuse->cerrado = true;
        $acuse->save();
    }

    public function agregarVenta($id)
    {
        $acuse = acuses::get()->last();
        $venta = ventas::find($id);
        $totalVentasAcuse = ventas::where('id_acuse', '=', '$acuse->id')->count();
        if ($totalVentasAcuse < 25) {
            $venta->id_acuse = $acuse->id;
        } else {
            $acuseNuevo = new acuses();
            $acuseNuevo->fecha_creado = today();
            $acuseNuevo->save();
            $venta->id_acuse = $acuseNuevo->id;
        }
        $venta->save();
    }

    public function sellar(Request $request)
    {
        $request->validate([
            'fecha_sellado' => 'required',
            'id' => 'required',
        ]);
        $acuse = acuses::find($request->id);
        $acuse->fecha_sellado = $request->fecha_sellado;
        $ventasEnAcuse = ventas::where('id_acuse', '=', $request->id)->get('id','estado_venta');
        foreach ($ventasEnAcuse as $venta) {
            $venta->estado_venta = 11;                        //Cambio a estado comisionable
            $venta->save();
        }
        return ($this->index());
    }
}
