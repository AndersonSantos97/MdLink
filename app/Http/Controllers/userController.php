<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
        //lleva a la vista donde se administran los usuarios
        public function usersview(){
            //$list = $this->searchRole();
            //dd(auth()->user());
            try{
                $roles = roles::all();
                $currentUser = Auth()->user()->id;
                $users = DB::table('users')
                ->join('roles','users.rol','=','roles.id')
                ->select('users.id','users.username','roles.rol_descripcion','users.rol')
                ->where('users.estado',1)
                ->where('users.id','!=',$currentUser)
                ->get();
                //dd($roles);
                return view('Usuarios',compact('users','roles'));
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
    
        //Lista todos los usuarios
        public function index()
        {
            try{
                
                $usuarios = User::all();
                return view('',compact('usuarios'));
            }catch(Exception $e){
                return $e->getMessage();
            }
            
        }

        //crear un nuevo usuario
        public function store(Request $request){
            
            try{
                $usuario = new User([
                    'username'=>$request->usu_nombre,
                    'estado'=>1,
                    'password'=> Hash::make($request->usu_password),
                    'rol' => $request->usu_rol,
                    'created_at'=>Carbon::now(),
                    'email'=>$request->usu_nombre
                ]);
        
                $usuario->save();
                return redirect()->route('user.view')->with('success','Usuario Creado con éxito');
            }catch(Exception $e){
                print($e);
                return $e->getMessage();
            }
    
        }
        //Actualizar un usuario existente
        public function update(Request $request,$id){
    
            try{
                $usuario = User::find($id);
                if(!$usuario){
                    return redirect()->route('user.view')->with('error','Usuario no actualizado');
                }
        
                $request->validate([
                    'username' => 'nullable|string|max:8',
                    'password' => 'nullable|string|max:255',
                    'rol' => 'nullable|integer',
                ]);
        
                if($request->has('usu_nombre')){
                    $usuario->username = $request->usu_nombre;
                }
        
                // if($request->has('USU_ESTADO')){
                //     $usuario->USU_ESTADO = $request->USU_ESTADO;
                // }
        
                if($request->has('usu_password')){
                    $usuario->password = Hash::make($request->usu_password);
                }
        
                if($request->has('usu_rol')){
                    $usuario->rol = $request->usu_rol;
                }
                
                $usuario->updated_at = Carbon::now();

                $usuario->save();
        
                return redirect()->route('user.view')->with('success','usuario actualizado con exito');
            }catch(Exception $e){
                return redirect()->route('user.view')->with('Error','Error al actualizar el usuario: '.$e->getMessage());

            }
        }

        //Inhabilitar un usuario existente
        public function delete($id){
    
            try{
                $usuario = User::find($id);
                if(!$usuario){
                    return redirect()->route('user.view')->with('error','Usuario no actualizado');
                }
                $usuario->estado = 0;
                $usuario->updated_at = Carbon::now();

                $usuario->save();
        
                return redirect()->route('user.view')->with('success','usuario actualizado con exito');
            }catch(Exception $e){
                return redirect()->route('user.view')->with('Error','Error al actualizar el usuario: '.$e->getMessage());

            }
        }
    
}
