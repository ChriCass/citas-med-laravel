<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("usuarios", function (Blueprint $table) {
            $table->id();
            $table->string("dni")->unique();
            $table->string("apellidos");
            $table->string("nombres");
            $table
                ->string("email")
                ->unique()
                ->nullable();
            $table
                ->string("numero_historia_clinica")
                ->unique()
                ->nullable();
            $table->string("password");
            $table->string("telefono")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("usuarios");
    }
};
