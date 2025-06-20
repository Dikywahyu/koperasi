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
        Schema::table('instansis', function (Blueprint $table) {
            // Pastikan kolom sudah ada, kalau belum bisa tambah dulu:
            if (!Schema::hasColumn('instansis', 'penanggung_jawab_id')) {
                $table->foreignId('penanggung_jawab_id')->nullable()->after('telepon');
            }

            // Tambahkan foreign key constraint
            $table->foreign('penanggung_jawab_id')
                ->references('id')
                ->on('donaturs')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instansis', function (Blueprint $table) {
            $table->dropForeign(['penanggung_jawab_id']);
            $table->dropColumn('penanggung_jawab_id');
        });
    }
};
