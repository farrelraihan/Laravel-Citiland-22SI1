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
        Schema::create('stok_bahan_bakus', function (Blueprint $table) {
            $table->integer('id', autoIncrement:15);
            $table->char('Kodebahanbaku', 10);
            $table->char('NamaBahanBaku', 100);
            $table->char('JenisBahanBaku', 5);
            $table->char('UnitBahanBaku', 5);
            $table->char('JumlahBBMasuk', 10);
            $table->char('JumlahBBKeluar', 10);
            $table->char('Jumlah_Min', 10);
            $table->char('HargaBahanBaku', 30);
            $table->char('JumlahBahanBaku', 10);
            $table->char('PemakaianRataRata', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_bahan_bakus');
    }
};
