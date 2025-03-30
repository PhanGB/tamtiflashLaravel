<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('voucher', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable(); // Thêm cột 'name' vào bảng 'voucher'
            // 'id' là cột hiện tại mà bạn muốn thêm cột 'name' sau đó
        });
    }

    public function down()
    {
        Schema::table('voucher', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};
