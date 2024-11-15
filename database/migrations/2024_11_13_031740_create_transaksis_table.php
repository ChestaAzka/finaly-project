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
            $table->foreignId('mobil_id')  // Foreign key to 'mobil' table
                ->constrained()             // Automatically references 'id' in 'mobils' table
                ->onDelete('cascade');      // Delete transactions if the car is deleted

            $table->foreignId('user_id')  // Foreign key to 'users' table
                ->constrained()             // Automatically references 'id' in 'users' table
                ->onDelete('cascade');      // Delete transactions if the user is deleted

            $table->integer('rental_days'); // Duration of rental in days
            $table->decimal('total_cost', 10, 2); // Total rental cost (in currency)
            $table->enum('status', ['disewa', 'tidak disewa', 'di perbaiki'])->default('disewa'); // Transaction status
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');  // Drop the 'transaksis' table when rolling back
    }
};
