<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Món canh', 'status' => 1, 'mah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Món xào', 'status' => 1, 'mah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Món chiên', 'status' => 1, 'mah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Món luộc', 'status' => 1, 'mah' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
