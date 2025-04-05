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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->tinyInteger('role')->default(1)->comment('0 là admin, 1 là user, 2 là shipper')->after('my_code');
            $table->tinyInteger('work')->default(0)->comment('0 là đang rảnh, 1 là đang có đơn')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('role');
            $table->dropColumn('work');
        });
    }
};
