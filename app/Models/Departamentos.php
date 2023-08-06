<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany
};
use Illuminate\Support\Collection;

class Departamentos extends Model {

    use HasFactory;

    protected $fillable = ['codigo', 'departamento', 'id_division'];

    public function divisiones(): BelongsTo {
        return $this->belongsTo(Divisiones::class, 'id_division');
    }

    public function empleados(): HasMany {
        return $this->hasMany(Empleados::class, 'id_departamento');
    }

    public static function dameDepartamentos(bool $soloActivos = true): Collection {
        return self::where('activo', $soloActivos)->get()->pluck('departamento', 'id');
    }

}
