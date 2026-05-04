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
        Schema::create('penomoran', function (Blueprint $table) {
            $table->id();
            $table->string('penomoran')->unique(); // Untuk menyimpan format 000016
            $table->date('tanggal_pibk');          // Untuk menyimpan tanggal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penomoran');
    }
};
