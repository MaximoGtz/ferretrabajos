<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique(); // Correo único para cada cliente
            $table->string('contrasena'); // Se recomienda almacenar contraseñas hasheadas
            $table->string('red_social')->nullable(); // Red social opcional
            $table->string('imagen')->nullable(); // Imagen opcional
            $table->string('estado')->default('activo'); // Estado (activo/inactivo)
            $table->string('direccion')->nullable(); // Dirección opcional
            $table->string('telefono')->nullable(); // Teléfono opcional
            $table->string('verificacion')->nullable(); // Teléfono opcional
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
