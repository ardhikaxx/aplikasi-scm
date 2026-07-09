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
        Schema::create('detail_so', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_so');
            $table->string('nama_produk', 255);
            $table->integer('jumlah');
            $table->foreign('id_so')->references('id_so')->on('sales_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_so');
    }
};
