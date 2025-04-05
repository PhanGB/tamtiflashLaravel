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
        if (!Schema::hasTable('voucher')) {
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('quantity');
            $table->integer('value');
            $table->integer('max_value');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
