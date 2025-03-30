<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shop')->insert([
            ['name' => 'DimSum Thư Thái', 'rate' => '4', 'short_description' => 'Bán các loại món ăn, món súp, món chiên', 'time_open' => '6h - 18h', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tea Ba-Bốn Coffee', 'rate' => '4.5', 'short_description' => 'Bán các loại trà sữa, trà trái cây', 'time_open' => '6h - 22h', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hippo Loco', 'rate' => '4.5', 'short_description' => 'Bán các loại trà sữa, coffee', 'time_open' => '6h - 23h', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
