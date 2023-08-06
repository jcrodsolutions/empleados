<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
{
    private string $tabla = 'users';
    public function run()
    {
        $password = Hash::make('87654321');
        $data = [
            ['name'=>'admin', 'email'=>'admin@admin.com', 'password'=>$password],
        ];
       DB::table($this->tabla)->insert($data); 
       
       DB::table($this->tabla)->update([
           'created_at'=>now(),
           'updated_at'=>now(),
       ]);
    }
}
