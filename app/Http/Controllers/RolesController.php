<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{ //lleva a la vista del menu del administrador
    public function menu(){
        if(Auth::check()){
            return view('Menuadmin');
        }else{
            return redirect()->route('home');
        }
        //return view('Menuadmin');
    }

    //lleva a la vista del menu del moderador
    public function moder(){
        
        if(Auth::check()){
            return view('Menumoderador');
        }else{
            return redirect()->route('home');
        }
    }

    public function visor(){
        
        if(Auth::check()){
            return view('Menuvisor');
        }else{
            return redirect()->route('home');
        }
    }

}
