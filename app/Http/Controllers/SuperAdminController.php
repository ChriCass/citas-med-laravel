<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index() {
        return view('superadmin.index');
    }

    // Listar usuarios en una vista Blade
    public function usuarios() {
        $usuarios = Usuario::with('roles')->get();
        return view('superadmin.usuarios', compact('usuarios')); // <-- Devuelve Blade
    }

    // Crear usuario y redirigir a la lista
    public function crearUsuario(Request $request) {
        $usuario = Usuario::create([
            'dni' => $request->dni,
            'apellidos' => $request->apellidos,
            'nombres' => $request->nombres,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $rol = Rol::where('nombre', $request->rol)->first();
        $usuario->roles()->attach($rol->id);

        return redirect()->route('superadmin.usuarios')->with('success', 'Usuario creado correctamente');
    }
}
