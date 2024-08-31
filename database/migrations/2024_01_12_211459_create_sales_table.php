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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices');
            $table->string('correlativo')->unique();
            $table->date('fechaEmision')->nullable();           
            $table->double('totalVenta',12,2);
            $table->double('totalPagado',12,2);
            $table->foreignId('vendedor_id')->constrained('users');
            $table->foreignId('cliente_id')->constrained('buyers')->nullable();
            $table->string('cliente_doc')->nullable();
            $table->string('cliente_nom')->nullable();
            $table->string('cliente_direccion')->nullable();
            $table->text('observacion')->nullable();
            $table->string('metodoPago');
            $table->boolean('envio')->default(false);      
            $table->enum('estado', ['A','I'])->default('A');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
