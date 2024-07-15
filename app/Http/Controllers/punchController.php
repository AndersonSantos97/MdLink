<?php

namespace App\Http\Controllers;

use App\Models\punches;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class punchController extends Controller
{
    public function viewPunch(){

        $punches = [];
        return view('Consulta',compact('punches'));
    }

    public function searchToday(){
        $punches = DB::table('punch')
        ->where('punches.fecha','=',Carbon::now())
        ->get();

        return view('Consulta',compact('punches'));
    }

    public function searchDate(Request $request){

        try{
            // Validar que las fechas estén presentes y en el formato correcto
            // $request->validate([
            //     'from_date' => 'required|date|before_or_equal:to_date',
            //     'to_date' => 'required|date|after_or_equal:from_date',
            // ]);
            $fromDate = $request->from_date;
            $toDate = $request->to_date;
            $punches = punches::join('empleado','empleado.id','=','punch.id_empleado')
            ->select("empleado.id","empleado.emp_nombre","punch.hora","punch.fecha")
            ->whereBetween('punch.fecha', [$request->from_date, $request->to_date])
            ->where('empleado.emp_estado','=',1)
            ->get();
    
            return view('Consulta',compact('punches','fromDate','toDate'));
        }catch(Exception $e){
            return redirect()->route('punch.view')->with('error', 'Error al realizar la consulta: ' . $e->getMessage());
        }
    }

    public function export(){
        ///$punches::
    }
}
