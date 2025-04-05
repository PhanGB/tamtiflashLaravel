<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up() {
        DB::table('shipping_fee')->insert([
            ['min_distance' => 0, 'max_distance' => 2, 'base_price' => 15000, 'extra_price_per_km' => null],
            ['min_distance' => 2, 'max_distance' => 5, 'base_price' => 15000, 'extra_price_per_km' => 5000],
            ['min_distance' => 5, 'max_distance' => 10, 'base_price' => 30000, 'extra_price_per_km' => 3000],
            ['min_distance' => 10, 'max_distance' => null, 'base_price' => 45000, 'extra_price_per_km' => 2000],
        ]);
    }

    public function down() {
        DB::table('shipping_fee')->whereIn('min_distance', [0, 2, 5, 10])->delete();
    }
};

