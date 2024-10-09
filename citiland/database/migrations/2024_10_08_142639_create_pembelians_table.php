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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('KodeBahanBaku', 10);
            $table->string('NamaBahanBaku', 100);
            $table->string('JenisBahanBaku', 5);
            $table->string('JumlahPembelian', 20);
            $table->string('UnitBahanBaku', 5);
            $table->string('NamaSupplier', 40);
            $table->string('NomorNota', 30);
            $table->string('HargaBahanBaku', 25);
            $table->dateTime('TanggalPembelian');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
