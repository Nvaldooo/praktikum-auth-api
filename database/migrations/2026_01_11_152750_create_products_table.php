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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID otomatis [cite: 242]
            $table->string('name'); // Nama produk [cite: 243]
            $table->decimal('price', 10, 2); // Harga produk [cite: 244]
            $table->integer('stock'); // Stok produk [cite: 245]
            $table->string('sku')->unique(); // Kode unik SKU [cite: 246]
            $table->timestamps(); // created_at & updated_at [cite: 247]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // Menghapus tabel jika rollback [cite: 251]
    }
};