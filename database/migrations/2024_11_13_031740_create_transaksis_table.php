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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobil_id')->constrained()->onDelete('cascade'); // Mobil yang disewa
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pengguna yang menyewa
            $table->integer('rental_days'); // Durasi sewa
            $table->decimal('total_cost', 10, 2); // Total biaya sewa
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); // Status transaksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
