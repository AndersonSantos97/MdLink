<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    // Mostrar departamentos
    public function index()
    {
        try {
            
            $departamento = departamento::all();

            return view('departamento.index', compact('departamento'));

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    //Mostrar un formulario para crear departamentos si es que se crea una vista para ello. (quedo atento a posibles correcciones)
    public function create()
    {
        return view('departamento.create');
    }

    // Crear un departamento
    public function store(Request $request){
        
        try{
            $departamento = new departamento([
                'DESCRIPCION'=>$request->DEP_DESCRIPCION,
                'DEP_ESTADO'=>1,
                'CREATED_AT'=>Carbon::now(),
            ]);
    
            $departamento->save();
            return redirect()->route('departamento.index')->with('success','Departamento creado con éxito');
        }catch(Exception $e){
            print($e);
            return $e->getMessage();
        }

    }



//Mostrar un departamento especifico
public function show($id){

    try{
        $departamento = departamento::find($id);

        if(!$departamento){
            return redirect()->route('')->with('Error','Departamento no encontrado o no existe');
        }
        return view('',compact('departamento'));

    }catch(Exception $e){

        return $e->getMessage();
    }
    
}

// Actualizar - editar departamento

public function update(Request $request,$id){

    try{
        $departamento = departamento::find($id);
        if(!$departamento){
            return redirect()->route('')->with('error','Departamento no actualizado');
        }

        $request->validate([
            'DEP_DESCRIPCION' => 'nullable|varchar|max:50',
            'DEP_ESTADO' => 'nullable|integer',
        ]);


        if($request->has('DEP_DESCRIPCIÓN')){
            $departamento->DEP_DESCRIPCION = $request->DEP_DESCRIPCION;
        }

        if($request->has('DEP_ESTADO')){
            $departamento->DEP_ESTADO = $request->DEP_ESTADO;
        }


        $departamento->save();

        return redirect()->route('')->with('success','usuario actualizado con exito');
    }catch(Exception $e){
        return $e->getMessage();
    }
    


}

//eliminar un departamento
public function destroy($id){

    try{
        $departamento = departamento::all();
        $departamento = departamento::find($id);

        if(!$departamento){
            return redirect()->route('')->with('error','Departamento no encontrado');
        }

        $departamento->delete();
        return redirect()->route('')->with('success','Departamento eliminado exitosamente');
    }catch(Exception $e){
        return $e->getMessage();
    }
    
}
}
