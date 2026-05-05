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
        Schema::create('data_pemberitahuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->onDelete('cascade');
            $table->text('nama_barang')->nullable();
            $table->text('alamat_pengiriman')->nullable();
            $table->string('identitas_penerima')->nullable();
            $table->string('nama_penerima')->nullable();
            $table->text('alamat_penerima')->nullable();
            $table->string('identitas_pemberitahu')->nullable();
            $table->string('nama_pemberitahu')->nullable();
            $table->text('alamat_pemberitahu')->nullable();
            $table->string('no_tgl_izin_pjt')->nullable();
            $table->string('cara_pengangkut')->nullable();
            $table->string('nama_sarana_angkut')->nullable();
            $table->string('no_flight')->nullable();
            $table->string('pelabuhan_muat')->nullable();
            $table->string('pelabuhan_bongkar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pemberitahuan');
    }
};
