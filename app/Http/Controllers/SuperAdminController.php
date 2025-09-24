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

    public function usuarios() {
        return Usuario::with('roles')->get();
    }

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
        return $usuario;
    }
}
