<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UsuariosSeeder extends Seeder
{
    private string $tabla = 'usuarios';
    public function run()
    {
        $password = Hash::make('87654321');
        $data = [
            ['usuario'=>'admin','nombre'=>'Usuario Administrador', 'email'=>'admin@admin.com', 'password'=>$password],
        ];
       DB::table($this->tabla)->insert($data); 
       
       DB::table($this->tabla)->update([
           'created_at'=>now(),
           'updated_at'=>now(),
       ]);
    }
}
