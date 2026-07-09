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
        Schema::create('detail_penerimaan', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_penerimaan');
            $table->unsignedBigInteger('id_produk');
            $table->integer('jumlah');
            $table->decimal('harga', 12, 2);
            $table->decimal('subtotal', 14, 2);
            $table->foreign('id_penerimaan')->references('id_penerimaan')->on('penerimaan_barang');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penerimaan');
    }
};
