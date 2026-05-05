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
        Schema::table('penomoran', function (Blueprint $table) {
            if (Schema::hasColumn('penomoran', 'nama_pfpd') && Schema::hasColumn('penomoran', 'nip_pfpd')) {
                $table->dropColumn(['nama_pfpd', 'nip_pfpd']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penomoran', function (Blueprint $table) {
            $table->string('nama_pfpd')->nullable()->after('tanggal_pibk');
            $table->string('nip_pfpd')->nullable()->after('nama_pfpd');
        });
    }
};
