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
        Schema::create('diisi_bc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->onDelete('cascade');
            $table->string('nomor_bc11')->nullable();
            $table->string('nomor_pos')->nullable();
            $table->string('invoice')->nullable();
            $table->date('tanggal_invoice')->nullable();
            $table->string('nomor_bl_awb')->nullable();
            $table->date('tanggal_bl_awb')->nullable();
            $table->string('negara_asal')->nullable();
            $table->string('valuta', 5)->nullable();
            $table->decimal('fob', 15, 2)->nullable();
            $table->decimal('freight', 15, 2)->nullable();
            $table->decimal('asuransi', 15, 2)->nullable();
            $table->decimal('nilai_cif', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diisi_bc');
    }
};
