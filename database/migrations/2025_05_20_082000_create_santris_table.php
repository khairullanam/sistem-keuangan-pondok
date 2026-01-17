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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
             $table->string('nama');
            $table->string('nis')->unique();
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->string('kamar');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('bendahara_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
