<?php

namespace App\Http\Controllers;

use App\Models\horario;
use Exception;
use Illuminate\Http\Request;

class statisticsController extends Controller
{
    
    public function lateArrivals(){
        try{

            $horarios = horario::all();
            

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
