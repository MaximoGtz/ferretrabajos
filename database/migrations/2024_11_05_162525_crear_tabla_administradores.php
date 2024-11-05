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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->nullable();
            $table->string('apellido');
            $table->string('usuario')->unique(); // Campo único para el nombre de usuario
            $table->string('contrasena'); // Se recomienda almacenar contraseñas hasheadas
            $table->string('rol');
            $table->string('remember_token')->nullable();
            $table->string('imagen')->nullable(); // Campo opcional para la imagen
            $table->string('estado')->default(true); // Estado (activo/inactivo)
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
