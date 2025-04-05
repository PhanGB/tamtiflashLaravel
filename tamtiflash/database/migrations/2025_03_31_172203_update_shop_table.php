<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('shop', function (Blueprint $table) {
            // Thêm cột 'image' sau 'name'
            $table->string('image', 255)->nullable()->comment('Hình ảnh')->after('name');

            // Đổi kiểu dữ liệu của address_link thành TEXT
            $table->text('address_link')->nullable();

            // Thêm cột tọa độ sau 'address_link'
            $table->string('coordinates')->nullable()->comment('Tọa độ vị trí')->after('address_link');
        });
    }

    public function down()
    {
        Schema::table('shop', function (Blueprint $table) {
            // Xóa cột coordinates nếu rollback
            $table->dropColumn('coordinates');

            // Đổi lại kiểu dữ liệu của address_link thành VARCHAR(255)
            $table->string('address_link', 255)->nullable()->change();

            // Đổi lại tên cột 'address_link' thành 'address'
            $table->renameColumn('address_link', 'address');
        });
    }
};
