<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany
};
use Illuminate\Support\Collection;

class Divisiones extends Model {

    use HasFactory;

    protected $fillable = ['codigo', 'division', 'id_cia', 'activo'];
    protected $casts = ['activo' => 'boolean'];

    public function cias(): BelongsTo {
        return $this->belongsTo(Cias::class, 'id_cia');
    }

    public function departamentos(): HasMany {
        return $this->hasMany(Departamentos::class, 'id_division');
    }

    public static function dameDivisiones(bool $soloActivos = true): Collection {
        return self::where('activo', $soloActivos)->get()->pluck('division', 'id');
    }

}
