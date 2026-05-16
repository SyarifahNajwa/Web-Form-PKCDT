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
        Schema::table('pemeriksaan', function (Blueprint $table) {
            if (! Schema::hasColumn('pemeriksaan', 'hasil_uraian_barang')) {
                $table->text('hasil_uraian_barang')->nullable()->after('ukuran_kemasan');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemeriksaan', function (Blueprint $table) {
            if (Schema::hasColumn('pemeriksaan', 'hasil_uraian_barang')) {
                $table->dropColumn('hasil_uraian_barang');
            }
        });
    }
};
