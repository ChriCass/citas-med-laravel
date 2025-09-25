<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'dni',
        'apellidos',
        'nombres',
        'email',
        'numero_historia_clinica',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token', // importante para login con sesión
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // desde Laravel 10 en adelante
    ];

    public function roles()
    {
        return $this->belongsToMany(
            Rol::class,
            'usuario_tiene_rol', // tabla pivote
            'usuario_id',        // FK local
            'rol_id'             // FK en roles
        )->withTimestamps();
    }

    public function tieneRol(string $rolNombre): bool
    {
        return $this->roles()->where('nombre', $rolNombre)->exists();
    }

    public function asignarRol(string $rolNombre): void
    {
        $rol = Rol::where('nombre', $rolNombre)->firstOrFail();
        $this->roles()->syncWithoutDetaching([$rol->id]);
    }
}
