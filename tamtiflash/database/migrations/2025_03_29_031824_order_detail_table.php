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
        if (!Schema::hasTable('order_detail')) {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->foreignId('id_order')->constrained('orders')->onDelete('cascade');
            $table->foreignId('id_product')->constrained('products')->onDelete('cascade');
        });
    }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
