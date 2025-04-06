<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('migrations', function (Blueprint $table) {
        // Đảm bảo cột id có auto-increment
        $table->bigIncrements('id')->change();
    });
}

public function down()
{
    Schema::table('migrations', function (Blueprint $table) {
        $table->dropColumn('id');
    });
}

};
