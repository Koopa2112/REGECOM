<?php

namespace App\Exports;
use App\Models\ventas;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VentasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $ventas = ventas::with('asesor.user', 'acuse')
            ->whereHas('acuse', function($query) {
                $query->whereBetween('fecha_sellado', [$this->startDate, $this->endDate]);
            })
            ->get()
            ->map(function ($venta) {
                $fecha_sellado = Carbon::parse($venta->acuse->fecha_sellado);
                $month = $fecha_sellado->month;
                $weekOfMonth = $fecha_sellado->weekOfMonth;
                $formattedWeek = $month . '.' . $weekOfMonth;

                return [
                    'id' => $venta->id,
                    'acuse' => $venta->acuse->id,
                    'linea_venta' => $venta->linea_venta,
                    'nombre_cliente' => $venta->nombre_cliente,
                    'fecha_sellado' => $fecha_sellado->toDateString(),
                    'nombre_asesor' => $venta->asesor->user->nombre,
                    'semana' => $formattedWeek,
                ];
            });

        // Agrupar las ventas por semana
        $groupedVentas = $ventas->groupBy('semana')->sortKeys();
        $n = 0;
        // Crear una nueva colección para almacenar las ventas con separadores
        $separatedVentas = collect();
        foreach ($groupedVentas as $week => $ventasOfWeek) {
            $startDateCarbon = CARBON::parse($this->startDate);
            // Agregar una fila separadora
            $separatedVentas->push([
                'id' => 'ID',
                'acuse' => 'Acuse',
                'linea_venta' => 'Linea',
                'nombre_cliente' => 'Cliente',
                'fecha_sellado' => 'Fecha',
                'nombre_asesor' => 'Asesor',
                'semana' => "Semana $week del ". $startDateCarbon->addDays($n)->format('d-M-Y') ." al ". 
                            $startDateCarbon->addDays(6)->format('d-M-Y'),
            ]);
            $n += 7;
            // Agregar las ventas de la semana actual
            $separatedVentas = $separatedVentas->concat($ventasOfWeek);
        }

        return $separatedVentas;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Linea de Venta',
            'Nombre del Cliente',
            'Fecha de Acuse',
            'Nombre del Asesor',
            'Semana del Año',
        ];
    }
}
