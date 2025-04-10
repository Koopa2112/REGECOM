<?php

namespace App\Exports;
use App\Models\ventas;
use App\Models\rutas;

use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Borders;
use PhpOffice\PhpSpreadsheet\Style\Alignment;



class RutasExport implements FromCollection, WithHeadings, /*WithStyles,*/ WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $ruta;
    protected $ventas;

    public function __construct($id)
    {
        $this->ruta = $id;
    }

    public function collection()
    {
        $this->ventas = ventas::where('id_ruta', $this->ruta)
            ->whereIn('estado_venta', [7, 8, 9])
            ->get()
            ->map(function ($venta) {
                return [
                    'Linea' => $venta->linea_venta,
                    'Cliente' => $venta->nombre_cliente,
                    'Dirección' => "Calle: ".$venta->calle_entrega. " # ".$venta->numero_entrega. ". Col. " .$venta->colonia_entrega. ". REFERENCIAS: " .$venta->referencia_entrega, 
                    'Municipio' => $venta->municipio_entrega,
                    'Asesor' => $venta->asesor->user->user,
                ];
            });
            return $this->ventas;
    }

    public function headings(): array
    {
        return [
            'Linea',
            'Cliente',
            'Dirección',
            'Municipio',
            'Asesor',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Ajustar tamaño de columnas
                $event->sheet->getColumnDimension('A')->setWidth(11.3); // Columna A: Ancho 
                $event->sheet->getColumnDimension('B')->setWidth(15); // Columna B: A
                $event->sheet->getColumnDimension('C')->setWidth(70); // Columna C: 
                $event->sheet->getColumnDimension('D')->setWidth(12); // Columna D: Ancho 
                $event->sheet->getColumnDimension('E')->setWidth(8.4); // Columna E: Ancho 

                
                // Ajustar tamaño de filas
                $highestRow = $event->sheet->getHighestRow(); // Última fila con datos

                for($i = 2; $i <= $highestRow; $i++){
                    $event->sheet->getRowDimension($i)->setRowHeight(95);
                }


                $event->sheet->getRowDimension(1)->setRowHeight(15); // Fila 1: Alto 15


                // Aplicar formato general a las filas o columnas
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                 // Obtener la última fila y columna con datos

                $highestColumn = $event->sheet->getHighestColumn(); // Última columna con datos

                // Definir el rango dinámico
                $range = 'A1:' . $highestColumn . $highestRow;
                // Aplicar bordes a las celdas de la tabla
                $event->sheet->getStyle($range)->applyFromArray([  
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN, // Tipo de borde (fino)
                            'color' => ['argb' => '000000'], // Color negro
                        ],
                    ],
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER, // Alineación vertical centrada
                        'horizontal' => Alignment::HORIZONTAL_CENTER, // Opcional: Alineación horizontal centrada
                        'wrapText' => true, // Ajuste automático del texto
                    ],
                ]);
            },
        ];
    }
}
