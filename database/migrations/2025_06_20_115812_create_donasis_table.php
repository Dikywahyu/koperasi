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
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donatur_id')->constrained()->onDelete('cascade');
            $table->foreignId('zisco_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('jenis_donasi_id')->constrained()->onDelete('cascade');
            $table->decimal('nominal', 15, 2);
            $table->date('bulan_donasi');
            $table->string('metode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
