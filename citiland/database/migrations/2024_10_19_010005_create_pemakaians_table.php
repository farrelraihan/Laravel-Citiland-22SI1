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
        Schema::create('pemakaians', function (Blueprint $table) {
            $table->char('KodePemakaian', length: 10)->primary();
            $table->char('KodeJenisBahanBaku', length: 10); 
            $table->char('JumlahPemakaian', length: 20);
            $table->char('UnitBahanBaku', length: 5);
            $table->dateTime('TanggalPemakaian');
         

            $table->foreign('KodeJenisBahanBaku')->references('KodeJenisBahanBaku')->on('jenis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemakaians');
    }
};
