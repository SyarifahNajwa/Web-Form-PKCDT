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
        Schema::dropIfExists('pemeriksaan');
        Schema::dropIfExists('jaminan');
        Schema::dropIfExists('pemeriksa');
        Schema::dropIfExists('pfpd');
        Schema::dropIfExists('uraian_barang');
        Schema::dropIfExists('pib');
        Schema::dropIfExists('pengangkutan');
        Schema::dropIfExists('surat_izin');
        Schema::dropIfExists('pemberitahu');
        Schema::dropIfExists('penerima');
        Schema::dropIfExists('pengirim');
        Schema::dropIfExists('diisi_bc');
        Schema::dropIfExists('data_pemberitahuan');

        Schema::create('pengirim', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('nama_pengirim')->nullable();
            $table->text('alamat_pengirim')->nullable();
            $table->timestamps();
        });

        Schema::create('penerima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('jenis_identitas_penerima')->nullable();
            $table->string('identitas_penerima')->nullable();
            $table->string('nama_penerima')->nullable();
            $table->text('alamat_penerima')->nullable();
            $table->timestamps();
        });

        Schema::create('pemberitahu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('identitas_pemberitahu')->nullable();
            $table->string('nama_pemberitahu')->nullable();
            $table->text('alamat_pemberitahu')->nullable();
            $table->timestamps();
        });

        Schema::create('surat_izin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('nomor_surat_izin_pjt_ppjk')->nullable();
            $table->date('tanggal_surat_izin_pjt_ppjk')->nullable();
            $table->timestamps();
        });

        Schema::create('pengangkutan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->enum('cara_pengangkutan', ['udara', 'laut', 'darat'])->nullable();
            $table->string('nama_sarkut')->nullable();
            $table->string('no_flight')->nullable();
            $table->string('pelabuhan_muat')->nullable();
            $table->string('pelabuhan_bongkar')->nullable();
            $table->timestamps();
        });

        Schema::create('pib', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('nomor_bc11')->nullable();
            $table->date('tanggal_bc11')->nullable();
            $table->string('nomor_pos')->nullable();
            $table->string('invoice')->nullable();
            $table->date('tanggal_invoice')->nullable();
            $table->string('nomor_bl_awb')->nullable();
            $table->date('tanggal_bl_awb')->nullable();
            $table->string('negara_asal_barang')->nullable();
            $table->string('valuta', 5)->nullable();
            $table->decimal('fob', 15, 2)->nullable();
            $table->decimal('freight', 15, 2)->nullable();
            $table->decimal('asuransi', 15, 2)->nullable();
            $table->decimal('nilai_cif', 15, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('uraian_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->text('uraian_barang')->nullable();
            $table->unsignedInteger('jumlah_kemasan')->nullable();
            $table->decimal('berat', 15, 2)->nullable();
            $table->decimal('nilai_cif', 15, 2)->nullable();
            $table->string('kota_pibk')->nullable();
            $table->string('pemberitahu')->nullable();
            $table->string('np')->nullable();
            $table->string('pos_tarif_hs')->nullable();
            $table->decimal('ndpbm', 15, 2)->nullable();
            $table->decimal('dalam_rupiah', 15, 2)->nullable();
            $table->decimal('bm', 15, 2)->nullable();
            $table->decimal('cukai', 15, 2)->nullable();
            $table->decimal('ppn', 15, 2)->nullable();
            $table->decimal('ppnbm', 15, 2)->nullable();
            $table->decimal('pph', 15, 2)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('pfpd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('nama_pfpd')->nullable();
            $table->string('nip_pfpd')->nullable();
            $table->timestamps();
        });

        Schema::create('pemeriksa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('nama_pemeriksa')->nullable();
            $table->string('nip_pemeriksa')->nullable();
            $table->timestamps();
        });

        Schema::create('jaminan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('pembayaran')->nullable();
            $table->string('jaminan')->nullable();
            $table->string('pejabat_penerima')->nullable();
            $table->timestamps();
        });

        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penomoran_id')->constrained('penomoran')->cascadeOnDelete();
            $table->string('hari')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('nama')->nullable();
            $table->string('contoh')->nullable();
            $table->string('foto')->nullable();
            $table->text('catatan')->nullable();
            $table->time('jam_mulai_periksa')->nullable();
            $table->time('jam_selesai_periksa')->nullable();
            $table->string('lokasi_pemeriksaan')->nullable();
            $table->string('kondisi_segel')->nullable();
            $table->unsignedInteger('jumlah_satuan_barang')->nullable();
            $table->string('jenis_kemasan')->nullable();
            $table->string('ukuran_kemasan')->nullable();
            $table->text('spesifikasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
        Schema::dropIfExists('jaminan');
        Schema::dropIfExists('pemeriksa');
        Schema::dropIfExists('pfpd');
        Schema::dropIfExists('uraian_barang');
        Schema::dropIfExists('pib');
        Schema::dropIfExists('pengangkutan');
        Schema::dropIfExists('surat_izin');
        Schema::dropIfExists('pemberitahu');
        Schema::dropIfExists('penerima');
        Schema::dropIfExists('pengirim');
    }
};
