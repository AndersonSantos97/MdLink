<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;

class empleadoController extends Controller
{
        // Mostrar inicio empleados
        public function emp(){
            return view('Empleados');
        }
       
        public function buscarPorId($id){
        $empleado = empleado::find($id);
    
        if (!$empleado) {
            return "No se encontró ningún empleado con el ID: $id";
        }
        //por si se hace vista para la busqueda.
        //return view('empleados.detalle', compact('empleado'));
        }
    
        //guardar
        public function guardar(Request $request){
        $empleado = new Empleado();
        $empleado->EMP_NOMBRE = $request->input('nombre');
        $empleado->EMP_DNI = $request->input('dni');
        $empleado->EMP_FECHA_NAC = $request->input('fecha_nac');
        $empleado->EMP_HORARIO = $request->input('horario');
        $empleado->EMP_DEPARTAMENTO = $request->input('departamento');
        $empleado->EMP_ESTADO = $request->input('estado');
        $empleado->EMP_RFID = $request->input('rfid');
        $empleado->save();
    
        return redirect()->route('Empleados')->with('exito', 'Empleado guardado exitosamente!!');
        }
        //actualizar
        public function actualizar(Request $request, $id)
        {
        $empleado = Empleado::find($id);
    
        if (!$empleado) {
            return "No se encontró ningún empleado con el ID: $id";
        }
    
        $empleado->EMP_NOMBRE = $request->input('nombre');
        $empleado->EMP_DNI = $request->input('dni');
        $empleado->EMP_FECHA_NAC = $request->input('fecha_nac');
        $empleado->EMP_HORARIO = $request->input('horario');
        $empleado->EMP_DEPARTAMENTO = $request->input('departamento');
        $empleado->EMP_ESTADO = $request->input('estado');
        $empleado->EMP_RFID = $request->input('rfid');
        $empleado->save();
    
        return redirect()->route('Empleados')->with('exito', 'Empleado actualizado exitosamente!!');
        }
    
        //eliminar
        public function eliminar($id)
        {
        $empleado = Empleado::find($id);
    
        if (!$empleado) {
            return "No se encontró ningún empleado con el ID: $id";
        }
    
        $empleado->delete();
    
        return redirect()->route('Empleados')->with('exito', 'Empleado eliminado exitosamente!!');
        }
}
