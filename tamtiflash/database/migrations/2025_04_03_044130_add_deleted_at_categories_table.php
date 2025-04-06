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
        Schema::table('categories', function (Blueprint $table) {
            // Kiểm tra nếu cột 'deleted_at' chưa tồn tại
            if (!Schema::hasColumn('categories', 'deleted_at')) {
                $table->timestamp('deleted_at')->nullable()->after('updated_at'); // Thêm cột 'deleted_at'
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('deleted_at'); // Xóa cột 'deleted_at'
        });
    }
};

