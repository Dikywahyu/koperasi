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
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_pengajuan');
            $table->decimal('jumlah_pinjaman', 15, 2);
            $table->integer('tenor_bulan'); // jangka waktu cicilan
            $table->decimal('bunga', 5, 2); // persen misal 2.5%
            $table->enum('status', ['pending', 'disetujui', 'ditolak', 'lunas'])->default('pending');
            $table->date('tanggal_disetujui')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamans');
    }
};
