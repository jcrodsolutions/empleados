<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PaisesSeeder extends Seeder
{
    private string $tabla = "paises";
    public function run()
    {
        $data = [
            ['codigo'=>'PA','pais'=>'PANAMA'],
            ['codigo'=>'CO','pais'=>'COLOMBIA'],
            ['codigo'=>'VE','pais'=>'VENEZUELA'],
        ];
        DB::table($this->tabla)->insert($data);
        
        DB::table($this->tabla)->update([
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
