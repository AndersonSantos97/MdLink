<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('Login');
    }
    
    public function login(loginRequest $request){
        try{
            $credentials =$request->getCredentials();
            
            if(!Auth::validate($credentials)){
                return redirect()->route('home')->withErrors(['auth' => 'Credenciales incorrectas']);
            }

            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return $this->authenticated($request,$user);


        }catch(Exception $e){
            
            return $e->getMessage();
        }
    }

    public function authenticated(Request $request, $user){
        //return redirect()->route('admin.menu');
        // if($user->rol =='1'){
        //     return redirect()->route('admin.menu');
        // }else{
        //     return redirect()->view('Menuvisor');
        // } 

        if($user->estado ==3){
            return redirect()->route('users.change');
        }elseif($user->estado==1){
            switch($user->rol){
                case 1:
                    return redirect()->route('admin.menu');
                
                case 2:
                    return redirect()->route('moder.menu');
    
                case 3:
                    return redirect()->route('visor.menu');
                
                default:
                    redirect()->route('home');
            }
        }

    }

    public function logout(Request $request){
        try{
            //Session::flush();
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerate();
    
            return redirect()->route('home');

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
