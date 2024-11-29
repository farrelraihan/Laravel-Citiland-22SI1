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
            $table->char('KodePembelian', 10);
            $table->integer('JumlahBahanBaku');
            $table->decimal('HargaRetur', 15, 2);
            $table->dateTime('TanggalRetur');
            $table->timestamps();
    
            // Foreign key relationship
            $table->foreign('KodePembelian')
                ->references('KodePembelian')
                ->on('pembelians');


            
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
