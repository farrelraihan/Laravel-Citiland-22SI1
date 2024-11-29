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
            $table->char('KodePembelian', 10)->primary();
            $table->char('KodeJenisBahanBaku', 10);
            $table->integer('JumlahPembelian');
            $table->char('kode_supplier', 10);
            $table->decimal('HargaBahanBaku', 15, 2);
            $table->dateTime('TanggalPembelian');
            $table->timestamps();


            // Foreign key relationships
            $table->foreign('KodeJenisBahanBaku')->references('KodeJenisBahanBaku')->on('jenis');
            $table->foreign('kode_supplier')->references('kode_supplier')->on('suppliers');

            
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
