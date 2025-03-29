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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('create_at')->useCurrent();
            $table->integer('total');
            $table->string('status', 50);
            $table->string('payment_method');
            $table->text('note')->nullable();
            $table->integer('shipping_fee');
            $table->timestamp('update_at')->useCurrent();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_driver')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
