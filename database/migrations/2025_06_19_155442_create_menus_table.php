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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul menu
            $table->string('route')->nullable(); // Nama route Laravel (bisa null)
            $table->string('icon')->nullable(); // Ikon menu (opsional)
            $table->unsignedBigInteger('parent_id')->nullable(); // Menu induk
            $table->integer('order')->default(0); // Urutan
            $table->unsignedBigInteger('permission_id')->nullable(); // Relasi ke permission

            $table->timestamps();

            // Relasi ke menus.id untuk submenu
            $table->foreign('parent_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');

            // Foreign key ke permissions.id (dari spatie)
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
