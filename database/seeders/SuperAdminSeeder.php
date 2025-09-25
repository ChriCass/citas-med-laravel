<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el usuario SuperAdmin si no existe
        $superadmin = Usuario::firstOrCreate(
            ["email" => "admin@clinica.com"],
            [
                "dni" => "00000000",
                "apellidos" => "Admin",
                "nombres" => "Super",
                "numero_historia_clinica" => null,
                "password" => Hash::make("admin123"),
            ]
        );

        // Buscar el rol superadmin
        $rol = Rol::where("nombre", "superadmin")->first();

        // Si existe el rol y no está asignado aún, lo asignamos
        if ($rol && !$superadmin->roles()->where("rol_id", $rol->id)->exists()) {
            $superadmin->roles()->attach($rol->id);
        }
    }
}
