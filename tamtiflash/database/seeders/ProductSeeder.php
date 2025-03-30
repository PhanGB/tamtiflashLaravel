<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Óc Heo Hầm Trái Bí', 'image' => '', 'price' => 30000, 'status' => 0, 'sold' => 11, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 1],
            ['name' => 'Há cảo Tôm thịt', 'image' => '', 'price' => 45000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 1],
            ['name' => 'Xíu Mại', 'image' => '', 'price' => 24000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 1],
            ['name' => 'Súp Óc Heo Nguyên Bộ', 'image' => '', 'price' => 40000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 1],
            ['name' => 'Súp Trứng Lòng Đào', 'image' => '', 'price' => 22000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 1],
            ['name' => 'Trà Vải', 'image' => '', 'price' => 22000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 2],
            ['name' => 'Trà sữa Soccola', 'image' => '', 'price' => 22000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 2],
            ['name' => 'Trà sữa thái xanh', 'image' => '', 'price' => 22000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 2],
            ['name' => 'Trà sữa thái đỏ', 'image' => '', 'price' => 22000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 2],
            ['name' => 'Sâm dứa sữa', 'image' => '', 'price' => 22000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 2],
            ['name' => 'Trà Đào Hồng Đài', 'image' => '', 'price' => 24000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 3],
            ['name' => 'Trà Ô Long Hoàng Gia', 'image' => '', 'price' => 20000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 3],
            ['name' => 'Trà Sen Vàng', 'image' => '', 'price' => 25000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 3],
            ['name' => 'Sữa Tươi Trân Châu Đường Đen', 'image' => '', 'price' => 30000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 3],
            ['name' => 'Sữa Tươi Trân Châu Cacao', 'image' => '', 'price' => 32000, 'status' => 0, 'sold' => 10, 'created_at' => now(), 'updated_at' => now(), 'id_cate' => 1, 'id_shop' => 3],
        ]);
    }
}
