<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                "nombre" => "superadmin",
                "descripcion" => "Acceso total al sistema",
            ],
            ["nombre" => "cajero", "descripcion" => "Gestión de pagos"],
            [
                "nombre" => "medico",
                "descripcion" => "Gestión de turnos y consultas",
            ],
            [
                "nombre" => "paciente",
                "descripcion" => "Reserva y gestión de citas",
            ],
        ];

        foreach ($roles as $rol) {
            Rol::firstOrCreate(["nombre" => $rol["nombre"]], $rol);
        }
    }
}
