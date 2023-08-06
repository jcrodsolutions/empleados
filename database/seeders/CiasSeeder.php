<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiasSeeder extends Seeder
{
    private string $tabla = 'cias';
    public function run()
    {
        $data = [
            ['codigo'=>'1000', 'cia'=>'CIA 1000'],
            ['codigo'=>'1001', 'cia'=>'CIA 1001'],
        ];
       DB::table($this->tabla)->insert($data); 
       
       DB::table($this->tabla)->update([
           'created_at'=>now(),
           'updated_at'=>now(),
       ]);
    }
}
