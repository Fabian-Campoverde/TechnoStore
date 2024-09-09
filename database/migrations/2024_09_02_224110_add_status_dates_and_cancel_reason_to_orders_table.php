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
        Schema::table('orders', function (Blueprint $table) {
            $table->timestamp('approved_at')->nullable()->after('status');
            $table->timestamp('shipped_at')->nullable()->after('approved_at');
            $table->timestamp('canceled_at')->nullable()->after('shipped_at');
            
            // Añadir campo para el motivo de cancelación
            $table->text('cancellation_reason')->nullable()->after('canceled_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('approved_at');
            $table->dropColumn('shipped_at');
            $table->dropColumn('canceled_at');
            $table->dropColumn('cancellation_reason');
        });
    }
};
