<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tabla = 'departamentos';
    
    public function up()
    {
        Schema::create($this->tabla, function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_division')->constrained('divisiones')->nullable(false);
            $table->string('codigo', 10)->nullable(false);
            $table->string('departamento', 50)->nullable(false);
            $table->boolean('activo')->default(1)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tabla);
    }
};
