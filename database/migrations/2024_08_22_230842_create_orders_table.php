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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('document_type');
            $table->string('document_number');
            $table->string('address');
            $table->string('department');
            $table->string('province');
            $table->string('district');
            $table->string('zone')->nullable();
            $table->string('reference')->nullable();
            $table->unsignedBigInteger('payment_method_id'); 
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('restrict');
            $table->string('payment_image');
            $table->date('payment_date');
            $table->string('operation_code');
            $table->decimal('total', 10, 2);
            $table->enum('status', ['Pendiente', 'Aprobado', 'Enviado', 'Cancelado'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
