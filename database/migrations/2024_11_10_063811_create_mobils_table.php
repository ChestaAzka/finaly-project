<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('merek');
            $table->string('tipe');
            $table->year('tahun_produksi');
            $table->string('no_polisi')->unique();
            $table->integer('kapasitas_penumpang');
            $table->enum('transmisi', ['manual', 'otomatis']);
            $table->enum('jenis_bahan_bakar', ['bensin', 'solar', 'listrik']);
            $table->decimal('harga_sewa_per_hari', 10, 2);
            $table->enum('status_ketersediaan', ['tersedia', 'disewa', 'perbaikan'])->default('tersedia');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mobils');
    }
};
