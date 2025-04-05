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
        Schema::table('admin', function (Blueprint $table) {
            //
            // Add the new column
            $table->string('email')->after('name')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            //
            // Drop the column if it exists
            if (Schema::hasColumn('admin', 'email')) {
                $table->dropColumn('email');
            }
        });
    }
};
