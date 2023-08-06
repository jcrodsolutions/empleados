<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposDeContrato extends Model
{
    use HasFactory;
    protected $table = "tipos_de_contrato";
    protected $fillable = ['tipo'];
}
