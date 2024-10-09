<?php

namespace App\Http\Controllers;

use App\Exports\VentasExport;
use App\Exports\RutasExport;
use App\Models\rutas;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use App\Models\ventas;
use App\Models\zonas;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    //
    public function exportVentasMes(Request $request)
    {
        $month = $request->input('month');
        $date = Carbon::createFromFormat('Y-m', $month);
        $firstWednesday = $this->getFirstWednesdayOfMonth($date);
        $startDate = $firstWednesday->toDateString();

        $lastTuesday = $this->getLastTuesdayOfMonth($date);
        $endDate = $lastTuesday->toDateString();
        return Excel::download(new VentasExport($startDate, $endDate), 'ventas_' . $month . '.xlsx');
    }

    private function getFirstWednesdayOfMonth(Carbon $date)
    {
        $date->startOfMonth();
        if ($date->dayOfWeek == Carbon::MONDAY || $date->dayOfWeek == Carbon::TUESDAY)
            while ($date->dayOfWeek != Carbon::WEDNESDAY) {
                $date->addDay();
            }
        else {
            while ($date->dayOfWeek != Carbon::WEDNESDAY) {
                $date->addDay();
            }
        }
        return $date;
    }

    private function getLastTuesdayOfMonth(Carbon $date)
    {
        $date->endOfMonth();

        if ($date->dayOfWeek == Carbon::MONDAY) {
            while ($date->dayOfWeek != Carbon::TUESDAY) {
                $date->subDay();
            }
        } else {
            while ($date->dayOfWeek != Carbon::TUESDAY) {
                $date->addDay();
            }
        }

        return $date;
    }

    public function printAcuse($id)
    {
        if(auth()->user()->puesto_empleado != 3){
            // Ruta del archivo de formato
            $filePath = storage_path('public/Acuse_ventas.xls');

            // Cargar el archivo Excel
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();

            $row = 9; // Fila inicial 
            $ventas = ventas::where('id_acuse', '=', $id)->get();
            foreach ($ventas as $venta) {
                $nombre = $venta->nombre_cliente; // datos para nombre
                $celular = $venta->linea_venta; // datos para celular

                $worksheet->setCellValue('C' . $row, $nombre);
                $worksheet->setCellValue('D' . $row, $celular);

                $row++;
            }
            $hoy = today()->format('d / m / y');
            $worksheet->setCellValue('F6', $hoy);
            $worksheet->setCellValue('G6', $venta->id_acuse);
            // Configurar la respuesta para la descarga del archivo Excel
            $writer = new Xls($spreadsheet);
            $fileName = 'acuse_folio -'. $id .'.xls';

            return response()->streamDownload(function () use ($writer) {
                $writer->save('php://output');
            }, $fileName);
        }else{
            return view("message", ['msg' => "Página no encontrada"]);
        }
    }

    public function printRuta($id)
    {
        if(auth()->user()->puesto_empleado != 3){
            $ruta = rutas::with('zona')->find($id);
            $nombreZona = $ruta->zona->nombre_zona;
            return Excel::download(new RutasExport($id), 'Ruta_' . $id . '_' . $nombreZona . '.xlsx');
        }else{
            return view("message", ['msg' => "Página no encontrada"]);
        }
    }
}
