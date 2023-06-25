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
        Schema::create('produk_penjualan', function (Blueprint $table) {
            $table->id('id_produk_penjualan');
            $table->bigInteger('id_produk',false,true);
            $table->bigInteger('id_penjualan',false,true);
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_penjualans');
    }
};
