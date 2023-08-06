<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tabla = 'empleados';
    
    public function up()
    {
        Schema::create($this->tabla, function (Blueprint $table) {
            $table->id();
            $table->string('persona', 20)->unique()->nullable(false);
            $table->string('nombre', 50)->nullable(false);
            $table->string('apellido', 50)->nullable(false);
            $table->foreignId('id_nacionalidad')->constrained('paises')->nullable(false);
            $table->string('cedula', 20)->unique()->nullable(false);
            $table->datetime('fecha_nacimiento')->nullable(false);
            $table->foreignId('id_departamento')->constrained('departamentos')->nullable(false);
            $table->foreignId('id_tipo_de_contrato')->constrained('tipos_de_contrato')->nullable(false);
            $table->datetime('fecha_contrato')->nullable(false);
            $table->datetime('fecha_terminacion')->nullable(true);
            $table->string('email', 150)->nullable(true);
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
