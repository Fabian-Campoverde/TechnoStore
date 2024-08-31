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
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->string('comprobante')->nullable();
            $table->date('fechaCompra')->nullable();           
            $table->double('totalCompra',12,2)->nullable();
            $table->enum('estado', ['A','I'])->default('A');
            $table->foreignId('provider_id')->constrained('providers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputs');
    }
};
