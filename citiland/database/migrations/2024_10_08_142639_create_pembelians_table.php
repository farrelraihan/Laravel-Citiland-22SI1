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
            $table->string('KodeBahanBaku');
            $table->string('NamaBahanBaku');
            $table->string('JenisBahanBaku');
            $table->string('JumlahPembelian');
            $table->string('UnitBahanBaku');
            $table->string('NamaSupplier');
            $table->string('NomorNota');
            $table->string('HargaBahanBaku');
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
