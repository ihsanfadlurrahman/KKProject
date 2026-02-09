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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->foreignId('sewa_id')->constrained('sewas')->cascadeOnDelete();
            $table->date('bulan'); // contoh: 2025-01-01
            $table->integer('jumlah');
            $table->enum('status', ['lunas', 'nunggak'])->default('nunggak');
            $table->date('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
