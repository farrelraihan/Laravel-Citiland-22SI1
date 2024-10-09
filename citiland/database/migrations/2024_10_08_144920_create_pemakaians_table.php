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
            $table->id();
            $table->char('KodeBahanBaku', length: 10);
            $table->char('NamaBahanBaku', length: 100);
            $table->char('JenisBahanBaku', length: 5);
            $table->char('UnitBahanBaku', length: 5);
            $table->char('JumlahPemakaian', length: 20);
            $table->char('SaldoAwalBulan', length: 50);
            $table->char('SaldoAkhirBulan', length: 50);
            $table->timestamps();
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
