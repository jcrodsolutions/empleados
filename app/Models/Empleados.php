<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleados extends Model {

    use HasFactory;

    protected $fillable = ['persona', 'nombre', 'apellido', 'id_nacionalidad', 'cedula', 'fecha_nacimiento', 'id_departamento', 'id_tipo_de_contrato', 'fecha_contrato', 'fecha_terminacion','email'];

    protected function fullName():Attribute{
        return Attribute::make(
                get: fn ($value) => $this->nombre . ' ' . $this->apellido,
        );
    }
    
    public function nacionalidades(): BelongsTo {
        return $this->belongsTo(Paises::class, 'id_nacionalidad');
    }

    public function departamentos(): BelongsTo {
        return $this->belongsTo(Departamentos::class, 'id_departamento');
    }
    
    //use Illuminate\Database\Eloquent\Relations\BelongsTo;
    public function tiposDeContrato(): BelongsTo {
        return $this->belongsTo(TiposDeContrato::class, 'id_tipo_de_contrato');
    }
}
