<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(
            Usuario::class,
            'usuario_tiene_rol', // tabla pivote
            'rol_id',            // FK en pivote hacia roles
            'usuario_id'         // FK en pivote hacia usuarios
        )->withTimestamps();
    }
}
