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
        Schema::create('carrito_trabajador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrito_id')->nullable();
            $table->unsignedBigInteger('trabajadore_id');
            $table->timestamps();
        
            // Relaciones de claves foráneas
            $table->foreign('carrito_id')->references('id')->on('carritos')->onDelete('cascade');
            $table->foreign('trabajadore_id')->references('id')->on('trabajadores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
