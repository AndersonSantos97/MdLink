<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function menu(){
        // if(Auth::check()){
        //     return view('Menuadmin');
        // }else{
        //     //dd(Auth::check());
        //     return redirect()->route('home');
        // }
        return view('Menuadmin');
    }

    //lleva a la vista del menu del moderador
    public function moder(){
        return view('Menumoderador');
            
    }

    public function visor(){
        return view('Menuvisor');
    }

}
