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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('medida');
            $table->integer('stock')->default(1);
            $table->double('precio_venta',10,2)->nullable();
            $table->double('precio_compra',10,2)->nullable();
            $table->integer('stock_minimo')->default(0);
            $table->enum('estado', ['A','I'])->default('A');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
