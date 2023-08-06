<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposDeContratoSeeder extends Seeder
{
    private string $tabla = 'tipos_de_contrato';
    public function run()
    {
        $data = [
            ['tipo'=>'definido'],
            ['tipo'=>'indefinido'],
        ];
       DB::table($this->tabla)->insert($data); 
       
       DB::table($this->tabla)->update([
           'created_at'=>now(),
           'updated_at'=>now(),
       ]);
    }
}
