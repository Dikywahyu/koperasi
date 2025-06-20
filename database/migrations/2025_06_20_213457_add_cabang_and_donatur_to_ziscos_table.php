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
        Schema::table('ziscos', function (Blueprint $table) {
            $table->foreignId('cabang_id')->nullable()->after('user_id')
                ->constrained('cabangs')
                ->nullOnDelete();
        });

        Schema::table('donaturs', function (Blueprint $table) {
            $table->foreignId('zisco_id')->nullable()->after('instansi_id')
                ->constrained('ziscos')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ziscos', function (Blueprint $table) {
            $table->dropForeign(['cabang_id']);
            $table->dropColumn('cabang_id');
        });

        Schema::table('donaturs', function (Blueprint $table) {
            $table->dropForeign(['zisco_id']);
            $table->dropColumn('zisco_id');
        });
    }
};
