<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display users management view
    public function usersview()
    {
        try {
            $roles = roles::all();
            $currentUser = Auth()->user()->id;
            $users = DB::table('users')
                ->join('roles', 'users.rol', '=', 'roles.id')
                ->select('users.id', 'users.username', 'roles.rol_descripcion', 'users.rol')
                ->where('users.estado', 1)
                ->where('users.id', '!=', $currentUser)
                ->get();
            
            return view('Usuarios', compact('users', 'roles'));
        } catch (Exception $e) {
            return $e->getMessage(); // Consider using a proper error handling mechanism
        }
    }

    // List all users
    public function index()
    {
        try {
            $usuarios = User::all();
            return view('user.index', compact('usuarios')); // Specify the correct view name
        } catch (Exception $e) {
            return $e->getMessage(); // Consider using a proper error handling mechanism
        }
    }

    // Create a new user
    public function store(Request $request)
    {
        try {
            $request->validate([
                'usu_nombre' => 'required|string|max:255', // Adjust validation rules as per your form fields
                'usu_password' => 'required|string|max:255',
                'usu_rol' => 'required|integer',
            ]);

            $usuario = new User([
                'username' => $request->usu_nombre,
                'estado' => 3,
                'password' => Hash::make($request->usu_password),
                'rol' => $request->usu_rol,
                'created_at' => Carbon::now(),
                'email' => $request->usu_nombre // Assuming username is also used as email
            ]);

            $usuario->save();
            return redirect()->route('user.view')->with('success', 'Usuario creado con éxito');
        } catch (Exception $e) {
            return $e->getMessage(); // Consider using a proper error handling mechanism
        }
    }

    // Update an existing user
    public function update(Request $request, $id)
    {
        try {
            $usuario = User::find($id);
            if (!$usuario) {
                return redirect()->route('user.view')->with('error', 'Usuario no encontrado');
            }

            $request->validate([
                'usu_nombre' => 'nullable|string|max:255',
                'usu_password' => 'nullable|string|max:255',
                'usu_rol' => 'nullable|integer',
            ]);

            if ($request->has('usu_nombre')) {
                $usuario->username = $request->usu_nombre;
            }

            if ($request->filled('usu_password')) {
                $usuario->password = Hash::make($request->usu_password);
            }

            if ($request->has('usu_rol')) {
                $usuario->rol = $request->usu_rol;
            }

            $usuario->updated_at = Carbon::now();
            $usuario->save();

            return redirect()->route('user.view')->with('success', 'Usuario actualizado con éxito');
        } catch (Exception $e) {
            return redirect()->route('user.view')->with('error', 'Error al actualizar el usuario: ' . $e->getMessage());
        }
    }

    // Disable an existing user
    public function delete($id)
    {
        try {
            $usuario = User::find($id);
            if (!$usuario) {
                return redirect()->route('user.view')->with('error', 'Usuario no encontrado');
            }

            $usuario->estado = 0;
            $usuario->updated_at = Carbon::now();
            $usuario->save();

            return redirect()->route('user.view')->with('success', 'Usuario inhabilitado con éxito');
        } catch (Exception $e) {
            return redirect()->route('user.view')->with('error', 'Error al inhabilitar el usuario: ' . $e->getMessage());
        }
    }

    // Display password change view
    public function change()
    {
        try {
            return view('CambiarContra');
        } catch (Exception $e) {
            return view('Login');
        }
    }

    // Process password change
    public function passChange(Request $request)
    {
        try {
            $usuario = User::find(Auth()->user()->id);
            if (!$usuario) {
                return redirect()->route('user.view')->with('error', 'Usuario no encontrado');
            }

            $request->validate([
                'password' => 'required|string|max:255',
            ]);

            $usuario->password = Hash::make($request->password);
            $usuario->estado = 1;
            $usuario->updated_at = Carbon::now();
            $usuario->save();

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerate();

            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect()->route('user.view')->with('error', 'Error al cambiar la contraseña: ' . $e->getMessage());
        }
    }
}

