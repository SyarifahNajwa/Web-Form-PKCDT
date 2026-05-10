<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pib', function (Blueprint $table) {
            $table->string('freight_currency', 5)->nullable()->after('freight');
        });
    }

    public function down()
    {
        Schema::table('pib', function (Blueprint $table) {
            $table->dropColumn('freight_currency');
        });
    }
};
