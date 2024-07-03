<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    // Mostrar dispositivos
    public function index()
    {
        
        try {
            $dispositivo = Dispositivo::all();
            return view('dispositivo.index', compact('dispositivo'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    //Mostrar un dispositivo especifico
    public function show($id)
    {
        try {
            $dispositivo = Dispositivo::findOrFail($id);
            return view('dispositivo.show', compact('dispositivo'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //muestra formulario para crear
    public function create()
    {
        return view('dispositivo.create');
    }
    // Crear un departamento
    public function store(Request $request)
    {
        try {
            
            return redirect()->route('dispositivo.index')->with('success', 'Dispositivo creado correctamente');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
// 
    public function edit($id)
    {
        try {
            $dispositivo = Dispositivo::findOrFail($id);
            return view('dispositivo.edit', compact('dispositivo'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
// Actualizar - editar dispositivo
    public function update(Request $request, $id)
    {
        try {
            
            return redirect()->route('dispositivo.index')->with('success', 'Dispositivo actualizado correctamente');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // eliminar dispositivo
    public function destroy($id)
    {
        try {
            $dispositivo = Dispositivo::findOrFail($id);
            $dispositivo->delete();
            return redirect()->route('dispositivo.index')->with('success', 'Dispositivo eliminado correctamente');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
