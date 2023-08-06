<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Cias extends Model
{
    use HasFactory;
    
    protected $fillable = ['codigo','cia'];
    protected $casts = ['activo'=>'boolean'];
    // no me acuerdo si necesito esto como string.
//    protected $casts = [
//        'codigo'=>'string',
//        'cia'=>'string',
//    ];
    
    public function divisiones():HasMany {
        return $this->hasMany(Divisiones::class,'id_cia');
    }
    
    public static function dameCias(bool $soloActivos = true):Collection{
        return self::where('activo', $soloActivos)->get()->pluck('cia', 'id');
    }
}
