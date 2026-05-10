<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('uraian_barang', function (Blueprint $table) {
            $table->string('satuan', 50)->nullable()->after('berat');
        });
    }

    public function down()
    {
        Schema::table('uraian_barang', function (Blueprint $table) {
            $table->dropColumn('satuan');
        });
    }
};
