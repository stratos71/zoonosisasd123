<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('raza', 100);
            $table->Integer('edad');
            $table->string('color', 100);
            $table->string('tamaño')->nullable();
            $table->string('genero', 100);
            $table->string('esterilizado', 100);

            $table->unsignedBigInteger('propietario_id');
            $table->foreign('propietario_id')->references('id')
                ->on('propietarios')->onDelete('cascade');

            $table->unsignedBigInteger('especie_id');
            $table->foreign('especie_id')->references('id')
                ->on('especies')->onDelete('cascade');

            $table->unsignedBigInteger('vacuna_id');
            $table->foreign('vacuna_id')->references('id')
                ->on('vacunas')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};