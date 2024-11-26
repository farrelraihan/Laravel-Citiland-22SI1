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
            $table->char('KodeRetur', 10)->primary();
            $table->char('KodeJenisBahanBaku', 10);
            $table->char('kode_supplier', 10);
            $table->integer('JumlahBahanBaku');
            $table->decimal('HargaRetur', 15, 2);
            $table->dateTime('TanggalRetur');
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
        Schema::dropIfExists('returs');
    }
};
