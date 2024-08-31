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
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('documento')->nullable();
            $table->bigInteger('nro_doc')->nullable();
            $table->string('nombre',250)->nullable();           
            $table->string('telefono',12)->nullable();
            $table->string('correo',100)->nullable();
            $table->string('direccion',80)->nullable();
            $table->enum('estado', ['A','I'])->default('A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyers');
    }
};
