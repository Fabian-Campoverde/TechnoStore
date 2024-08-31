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
        Schema::table('products', function (Blueprint $table) {
            
            
            // Agregar la columna provider_id
            $table->unsignedBigInteger('provider_id')->after('id')->nullable();; // Agrega la columna provider_id

            // Definir la nueva clave foránea
            $table->foreign('provider_id')->references('id')->on('providers'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Volver a agregar la columna store_id y la clave foránea
            $table->unsignedBigInteger('store_id')->after('id'); // Ajusta el tipo y posición según tu esquema

            // Volver a definir la clave foránea
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade'); // Ajusta la tabla de referencia según tu caso

            // Eliminar la columna provider_id
            $table->dropForeign(['provider_id']);
            $table->dropColumn('provider_id');
        });
    }
};
