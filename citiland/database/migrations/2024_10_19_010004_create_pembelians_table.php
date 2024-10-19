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
            $table->string('JumlahPembelian', 20);
            $table->string('UnitBahanBaku', 5);
            $table->char('kode_supplier'); //ambil dari tabel supplier
            $table->string('HargaBahanBaku', 25);
            $table->dateTime('TanggalPembelian');


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
