<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pemeriksaan', function (Blueprint $table) {
            $table->string('satuan_barang', 50)->nullable()->after('jumlah_satuan_barang');
        });
    }

    public function down()
    {
        Schema::table('pemeriksaan', function (Blueprint $table) {
            $table->dropColumn('satuan_barang');
        });
    }
};
