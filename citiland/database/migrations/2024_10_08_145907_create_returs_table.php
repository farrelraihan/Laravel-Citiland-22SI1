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
            $table->id();
            $table->char('KodeBahanBaku', length: 10);
            $table->char('NamaBahanBaku', length: 100);
            $table->char('JenisBahanBaku', length: 5);
            $table->char('NomorNota', length: 30);
            $table->char(column: 'NamaSupplier', length: 40);
            $table->char(column: 'JumlahRetur', length: 20);
            $table->char(column: 'HargaBahanBaku', length: 25);
            $table->dateTime(column: 'TanggalRetur');
            
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
