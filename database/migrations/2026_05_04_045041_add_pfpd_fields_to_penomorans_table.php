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
            $table->dropForeign(['pfpd_id']);
            $table->dropColumn('pfpd_id');
            $table->string('nama_pfpd')->nullable()->after('tanggal_pibk');
            $table->string('nip_pfpd')->nullable()->after('nama_pfpd');
        });
    }

    public function down(): void
    {
        Schema::table('penomoran', function (Blueprint $table) {
            $table->dropColumn(['nama_pfpd', 'nip_pfpd']);
            $table->unsignedBigInteger('pfpd_id')->nullable()->after('tanggal_pibk');
            $table->foreign('pfpd_id')->references('id')->on('pfpd')->onDelete('set null');
        });
    }
};
