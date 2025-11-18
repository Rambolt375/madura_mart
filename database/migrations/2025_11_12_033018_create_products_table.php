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
            $table->id();
            $table->string('kdbarang', 10)->unique();
            $table->string('nama_barang', 50)->unique();
            $table->string('jenis_barang', 50);
            $table->date('tgl_expired');
            $table->integer('harga_jual')->default(0);
            $table->integer('stok')->default(0);
            $table->string('foto_barang', 255);
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
}
};