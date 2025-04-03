<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up() {
        Schema::table('shipping_fee', function (Blueprint $table) {
            // Cập nhật cột extra_price_per_km cho phép NULL
            DB::statement("ALTER TABLE shipping_fee MODIFY extra_price_per_km INT NULL");

            // Thêm comment cho các cột
            DB::statement("ALTER TABLE shipping_fee MODIFY min_distance INT NOT NULL COMMENT 'Khoảng cách tối thiểu (km)'");
            DB::statement("ALTER TABLE shipping_fee MODIFY max_distance INT NULL COMMENT 'Khoảng cách tối đa (km), NULL nếu không giới hạn'");
            DB::statement("ALTER TABLE shipping_fee MODIFY base_price INT NOT NULL COMMENT 'Phí cơ bản'");
            DB::statement("ALTER TABLE shipping_fee MODIFY extra_price_per_km INT NULL COMMENT 'Phụ phí mỗi km sau min_distance'");
        });

        // Thêm ghi chú cho bảng
        DB::statement("ALTER TABLE shipping_fee COMMENT 'Bảng lưu thông tin phí vận chuyển theo khoảng cách'");
    }

    public function down() {
        Schema::table('shipping_fee', function (Blueprint $table) {
            DB::statement("ALTER TABLE shipping_fee MODIFY extra_price_per_km INT NOT NULL");
        });
    }
};
