<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $fillable = ['dni', 'apellidos', 'nombres', 'email', 'numero_historia_clinica', 'password'];
    protected $hidden = ['password'];

    public function roles() {
        return $this->belongsToMany(Rol::class, 'usuario_tiene_rol', 'usuario_id', 'rol_id')->withTimestamps();
    }

    public function tieneRol(string $rolNombre) {
        return $this->roles()->where('nombre', $rolNombre)->exists();
    }
}
