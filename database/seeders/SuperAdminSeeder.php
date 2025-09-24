<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
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

        $rol = Rol::where("nombre", "superadmin")->first();
        if (
            $rol &&
            !$superadmin
                ->roles()
                ->where("rol_id", $rol->id)
                ->exists()
        ) {
            $superadmin->roles()->attach($rol->id);
        }
    }
}
