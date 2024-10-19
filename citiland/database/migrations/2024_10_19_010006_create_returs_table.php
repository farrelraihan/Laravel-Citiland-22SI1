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
        Schema::create('returs', function (Blueprint $table) {
            $table->char('KodeRetur', length: 10)->primary();
            $table->char('KodeJenisBahanBaku', length: 10);

            $table->char( 'kode_supplier'); //ambil dari tabel supplier
            $table->char('JumlahBahanBaku', length: 20);
            $table->char( 'HargaRetur', length: 25);
            $table->char( 'satuanBahanBaku', length: 5);
            $table->dateTime( 'TanggalRetur');

            $table->foreign('KodeJenisBahanBaku')->references('KodeJenisBahanBaku')->on('jenis');
            $table->foreign('kode_supplier')->references('kode_supplier')->on('suppliers');


            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returs');
    }
};
