<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cias;

class DivisionesSeeder extends Seeder {

    private string $tabla = 'divisiones';

    public function run() {
        $cia1000 = Cias::firstWhere('codigo', '1000');
        $cia1001 = Cias::firstWhere('codigo', '1001');
        $data = [
            ['codigo' => $cia1000->codigo . '01', 'division' => 'DIVISION 1000-01', 'id_cia' => $cia1000->id],
            ['codigo' => $cia1000->codigo . '02', 'division' => 'DIVISION 1000-02', 'id_cia' => $cia1000->id],
            ['codigo' => $cia1001->codigo . '01', 'division' => 'DIVISION 1001-01', 'id_cia' => $cia1001->id],
            ['codigo' => $cia1001->codigo . '02', 'division' => 'DIVISION 1001-02', 'id_cia' => $cia1001->id],
        ];
        DB::table($this->tabla)->insert($data);

        DB::table($this->tabla)->update([
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}
