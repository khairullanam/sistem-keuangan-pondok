<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('koperasi_transactions', function (Blueprint $table) {
            if (Schema::hasColumn('koperasi_transactions', 'nama_barang')) {
                $table->dropColumn('nama_barang');
            }

            if (Schema::hasColumn('koperasi_transactions', 'harga_satuan')) {
                $table->dropColumn('harga_satuan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('koperasi_transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('koperasi_transactions', 'nama_barang')) {
                $table->string('nama_barang')->nullable();
            }

            if (!Schema::hasColumn('koperasi_transactions', 'harga_satuan')) {
                $table->integer('harga_satuan')->default(0);
            }
        });
    }
};
