<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aquí estoy llamando todos los Seeders en orden
        $this->call([
            RolesSeeder::class,
            SuperAdminSeeder::class,
        ]);
    }
}
