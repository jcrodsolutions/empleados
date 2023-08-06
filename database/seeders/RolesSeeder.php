<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class RolesSeeder extends Seeder
{
    private string $tabla = 'roles';
    public function run()
    {
        $data = [
            ['rol'=>'admin','descripcion'=>'Rol de Administrador'],
        ];
       DB::table($this->tabla)->insert($data); 
       
       DB::table($this->tabla)->update([
           'created_at'=>now(),
           'updated_at'=>now(),
       ]);
    }
}
