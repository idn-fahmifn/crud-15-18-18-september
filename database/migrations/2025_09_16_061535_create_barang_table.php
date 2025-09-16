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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            // relasinya
            $table->foreignId('id_kategori')
            ->constrained('kategori')
            ->cascadeOnDelete();

            $table->string('nama_barang');
            $table->string('gambar_product');
            $table->integer('stok');
            $table->string('harga');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
