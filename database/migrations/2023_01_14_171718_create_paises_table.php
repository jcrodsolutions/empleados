<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tabla = 'paises';
    public function up()
    {
        Schema::create($this->tabla, function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 5)->unique()->nullable(false);
            $table->string('pais', 50)->unique()->nullable(false);
            $table->boolean('activo')->default(1)->nullable(false);
            $table->timestamps();
        });
    }

   
    
    public function down()
    {
        Schema::dropIfExists($this->tabla);
    }
};
