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
    //     Schema::create('koperasi_transactions', function (Blueprint $table) {
    //     $table->id();
    //     $table->unsignedBigInteger('santri_id');
    //     $table->enum('jenis_transaksi', ['pembelian', 'penjualan']);
    //     $table->timestamps();

    //     $table->foreign('santri_id')->references('id')->on('santris')->onDelete('cascade');
    // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
