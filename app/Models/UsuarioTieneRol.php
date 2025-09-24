<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioTieneRol extends Model
{
    protected $table = 'usuario_tiene_rol';
    protected $fillable = ['usuario_id', 'rol_id'];
}
