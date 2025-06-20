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
        Schema::create('kwitansis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donasi_id')->constrained()->onDelete('cascade');
            $table->uuid('nomor_transaksi')->unique();
            $table->decimal('total', 15, 2);
            $table->decimal('komisi_zisco', 15, 2);
            $table->boolean('dicetak')->default(false);
            $table->date('bulan_donasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kwitansis');
    }
};
