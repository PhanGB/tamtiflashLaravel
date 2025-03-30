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
        Schema::create('shipping_fee', function (Blueprint $table) {
            $table->id();
            $table->integer('min_distance');
            $table->integer('max_distance');
            $table->integer('base_price');
            $table->integer('extra_price_per_km');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_fee');
    }
};
