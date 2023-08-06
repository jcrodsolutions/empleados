<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    private string $tabla = 'departamentos';
    public function run()
    {
        $data = [
            ['id_division'=>1,'codigo'=>'D001','departamento'=>'DIV01 DEPTO01'],
            ['id_division'=>1,'codigo'=>'D002','departamento'=>'DIV01 DEPTO02'],
            ['id_division'=>2,'codigo'=>'D003','departamento'=>'DIV02 DEPTO01'],
            ['id_division'=>2,'codigo'=>'D004','departamento'=>'DIV02 DEPTO02'],
            ['id_division'=>3,'codigo'=>'D005','departamento'=>'DIV03 DEPTO01'],
            ['id_division'=>3,'codigo'=>'D006','departamento'=>'DIV03 DEPTO02'],
            ['id_division'=>4,'codigo'=>'D007','departamento'=>'DIV04 DEPTO01'],
            ['id_division'=>4,'codigo'=>'D008','departamento'=>'DIV04 DEPTO02'],
        ];
       DB::table($this->tabla)->insert($data); 
       
       DB::table($this->tabla)->update([
           'created_at'=>now(),
           'updated_at'=>now(),
       ]);
    }
}
