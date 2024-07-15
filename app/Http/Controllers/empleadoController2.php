<?php


namespace App\Http\Controllers;

use App\Models\empleado;
use App\Models\Dispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class empleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('Empleados', compact('empleados'));

        

    }
    
   
    public function buscarPorDni(Request $request)
    {
        $dni = $request->input('FEMP_DNI');

        $empleados = Empleado::where('EMP_DNI', $dni)->get();

        return redirect()->route('Empleados.index')->with('exito', 'Empleado eliminado exitosamente!!');
    }

    //guardar
    public function guardar(Request $request){
        try {
            $empleado = new Empleado();
            $empleado->EMP_NOMBRE = $request->input('FEMP_NOMBRE');
            $empleado->EMP_DNI = $request->input('FEMP_DNI');
            $empleado->EMP_FECHA_NAC = $request->input('FEMP_FECHA_NAC');
            $empleado->EMP_HORARIO = $request->input('FEMP_HORARIO');
            $empleado->EMP_DEPARTAMENTO = $request->input('FEMP_DEPARTAMENTO');
            $empleado->EMP_ESTADO = $request->input('FEMP_ESTADO');
            $empleado->EMP_RFID = $request->input('FEMP_RFID');
            $empleado->EMP_LIDER = $request->input('FEMP_LIDER');
            $empleado->EMP_DISPOSITIVO = $request->input('FEMP_DISPOSITIVO');
            $empleado->save();
    
            return redirect()->route('Empleados.index')->with('exito', 'Empleado eliminado exitosamente!!');
        } catch (\Exception $e) {
            return "Hubo algun tipo de error" . $e->getMessage();

        }
    }
    
    //actualizar
    public function actualizar(Request $request, $id)
    {
        $empleado = Empleado::find($id);
    
        if (!$empleado) {
            return abort(404, 'Employee not found');
        }
    
        $empleado->EMP_NOMBRE = $request->FEMP_NOMBRE;
        $empleado->EMP_DNI = $request->FEMP_DNI;
        $empleado->EMP_FECHA_NAC = $request->FEMP_FECHA_NAC;
        $empleado->EMP_HORARIO = $request->FEMP_HORARIO;
        $empleado->EMP_DEPARTAMENTO = $request->FEMP_DEPARTAMENTO;
        $empleado->EMP_ESTADO = $request->FEMP_ESTADO;
        $empleado->EMP_RFID = $request->FEMP_RFID;
        $empleado->EMP_LIDER = $request->FEMP_LIDER;
        $empleado->EMP_DISPOSITIVO = $request->FEMP_DISPOSITIVO;
    
        $empleado->save();
        
        return redirect()->route('Empleados.index')->with('success', 'Empleado actualizado exitosamente!');
    }
    


    //eliminar
    public function eliminar($id){
    try {
        $empleado = Empleado::findOrFail($id);

        if (!$empleado) {
            return "No se encontró ningún empleado con el ID: $id";
        }

            $empleado->EMP_ESTADO = 0;
            $empleado->save();

            return redirect()->route('Empleados.index')->with('exito', 'Empleado eliminado exitosamente!!');
        } catch (\Exception $e) {
            return "Hubo algun tipo de error: " . $e->getMessage();
        }
    }

}