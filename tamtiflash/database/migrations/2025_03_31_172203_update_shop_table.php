<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('shop', function (Blueprint $table) {
            // Đổi tên cột address thành address_link
            $table->renameColumn('address', 'address_link');
        });

        Schema::table('shop', function (Blueprint $table) {
            $table->string('image', 255)->nullable()->comment('Hình ảnh')->after('name');
            // Đổi kiểu dữ liệu của address_link thành TEXT
            $table->text('address_link')->nullable()->change();
            // Thêm cột tọa độ
            $table->string('coordinates')->nullable()->comment('Tọa độ vị trí')->after('address_link');
        });
    }

    public function down()
    {
        Schema::table('shop', function (Blueprint $table) {
            // Xóa cột coordinates nếu rollback
            $table->dropColumn('coordinates');
        });

        Schema::table('shop', function (Blueprint $table) {
            // Đổi lại kiểu dữ liệu thành VARCHAR(255)
            $table->string('address_link', 255)->nullable()->change();
        });

        Schema::table('shop', function (Blueprint $table) {
            // Đổi lại tên cột như ban đầu
            $table->renameColumn('address_link', 'address');
        });
    }
};

