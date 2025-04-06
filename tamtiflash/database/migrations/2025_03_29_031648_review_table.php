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
        if (!Schema::hasTable('review')) {
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->timestamp('create_at')->useCurrent();
            $table->text('review');
            $table->tinyInteger('status')->default(1);
            $table->integer('rate');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_order')->constrained('orders')->onDelete('cascade');
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
