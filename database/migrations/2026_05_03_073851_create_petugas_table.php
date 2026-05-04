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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id(); // Ini untuk ID otomatis
            $table->string('nama');
            $table->string('nip')->unique(); // NIP dibuat unique agar tidak ada yang ganda
            $table->string('pangkat');
            $table->string('jabatan');
            $table->timestamps(); // Mencatat waktu data dibuat & diupdate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
