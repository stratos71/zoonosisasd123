<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('fecha_nacimiento');
            $table->string('ci');
            $table->string('complemento');
            $table->string('exp');
            $table->string('direccion');
            $table->string('distrito');
            $table->string('nro_domicilio');
            $table->string('correo');
            $table->string('celular');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propietarios');
    }
};
