<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // primary key auto increment
            $table->string('name'); // nama produk
            $table->text('description')->nullable(); // deskripsi produk (opsional)
            $table->unsignedBigInteger('price'); // harga produk
            $table->unsignedInteger('stock')->default(0); // stok produk
            $table->string('image')->nullable(); // path gambar produk (opsional)
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};