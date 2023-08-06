<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsuariosRoles extends Model
{
    use HasFactory;
    protected $table = "usuarios_roles";
    protected $fillable = ['id_usuario','id_rol'];

    public function usuarios(): BelongsTo {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
    public function roles(): BelongsTo {
        return $this->belongsTo(Roles::class, 'id_rol');
    }
}
