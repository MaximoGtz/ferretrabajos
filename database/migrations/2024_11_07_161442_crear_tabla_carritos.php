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
        Schema::create('carritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            // $table->unsignedBigInteger('trabajadore_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            // $table->foreign('trabajadore_id')->references('id')->on('trabajadores')->onDelete('cascade');
            $table->timestamps();
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
