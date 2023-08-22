<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacunas', function (Blueprint $table) {
            $table->id();
            $table->string('medicamento');
            $table->string('campaña');

            // Columnas de relación
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('animal_id');


            $table->string('estado');
            $table->string('fecha_vacuna');
            $table->Integer('nro_carnet')->nullable();
            $table->timestamps();

            // Estableciendo las relaciones
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('animal_id')->references('id')->on('animales')->onDelete('cascade');
           
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('vacunas');
    }
};
