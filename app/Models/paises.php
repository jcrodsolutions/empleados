<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Paises extends Model
{
    use HasFactory;
    
    protected $fillable = ['codigo','pais'];
    
    public static function damePaises(bool $soloActivos = true):Collection {
        return self::where('activo', $soloActivos)->get()->pluck('pais', 'id');
    }
    
    public function empleados():HasMany {
        return $this->hasMany(Empleados::class,'id_nacionalidad');
    }
}
