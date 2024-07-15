<?php

namespace App\Http\Controllers;

use App\Models\punches;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class exportController extends Controller
{
    public function export(Request $request){
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        $punches = punches::join('empleado','empleado.id','=','punch.id_empleado')
        ->select("empleado.id","empleado.emp_nombre","punch.hora","punch.fecha")
        ->whereBetween('punch.fecha', [$fromDate,$toDate])
        ->where('empleado.emp_estado','=',1)
        ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //agregar headers de la hoja
        $sheet->setCellValue('A1','ID');
        $sheet->setCellValue('B1','Nombre del Empleado');
        $sheet->setCellValue('C1','Hora');
        $sheet->setCellValue('D1','Fecha');

        //agregar los datos
        $row = 2;
        foreach ($punches as $punch){
            $sheet->setCellValue('A'.$row,$punch->id);
            $sheet->setCellValue('B'.$row,$punch->emp_nombre);
            $sheet->setCellValue('C'.$row,$punch->hora);
            $sheet->setCellValue('D'.$row,$punch->fecha);
            $row++;
        }

        $writter = new Xlsx($spreadsheet);
        $fileName = 'punches '.$toDate.'.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(),$fileName);
        $writter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
