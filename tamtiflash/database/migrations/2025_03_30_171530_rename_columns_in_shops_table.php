<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('shops', function (Blueprint $table) {
        $table->renameColumn('create_at', 'created_at');
        $table->renameColumn('update_at', 'updated_at');
    });
}

public function down()
{
    Schema::table('shops', function (Blueprint $table) {
        $table->renameColumn('created_at', 'create_at');
        $table->renameColumn('updated_at', 'update_at');
    });
}

};
