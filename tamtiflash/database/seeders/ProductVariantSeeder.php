<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_variant')->insert([
            [
                'name' => 'S',
                'price' => 24000,
                'status' => 0,
                'created_at' => '2025-03-16 00:00:00',
                'updated_at' => '2025-03-16 00:00:00',
                'id_product' => 11
            ],
            [
                'name' => 'M',
                'price' => 32000,
                'status' => 0,
                'created_at' => '2025-03-16 21:01:05',
                'updated_at' => '2025-03-16 21:21:06',
                'id_product' => 11
            ],
            [
                'name' => 'S',
                'price' => 20000,
                'status' => 0,
                'created_at' => '2025-03-16 22:21:06',
                'updated_at' => '2025-03-16 22:22:06',
                'id_product' => 12
            ],
            [
                'name' => 'S',
                'price' => 25000,
                'status' => 0,
                'created_at' => '2025-03-16 22:22:48',
                'updated_at' => '2025-03-16 22:23:36',
                'id_product' => 13
            ],
            [
                'name' => 'S',
                'price' => 24000,
                'status' => 0,
                'created_at' => '2025-03-16 22:23:36',
                'updated_at' => '2025-03-16 22:23:52',
                'id_product' => 14
            ],
            [
                'name' => 'M',
                'price' => 30000,
                'status' => 0,
                'created_at' => '2025-03-16 23:23:52',
                'updated_at' => '2025-03-16 23:24:37',
                'id_product' => 14
            ],
            [
                'name' => 'S',
                'price' => 26000,
                'status' => 0,
                'created_at' => '2025-03-16 23:24:37',
                'updated_at' => '2025-03-16 23:24:56',
                'id_product' => 15
            ],
            [
                'name' => 'M',
                'price' => 32000,
                'status' => 0,
                'created_at' => '2025-03-16 23:24:56',
                'updated_at' => '2025-03-16 23:25:05',
                'id_product' => 15
            ]
        ]);
    }
}
