<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tạo 5 shipper giả
        User::create([
            'name' => 'Nguyễn Văn Shipper 1',
            'email' => 'shipper1@example.com',
            'phone' => '0123456789',
            'password' => Hash::make('password123'),
            'status' => 1,  // Trạng thái: 1 là hoạt động
            'work' => 0,    // Trạng thái công việc: 0 là đang rảnh
            'my_code' => 'SHIP001',
            'role' => 2,    // Vai trò: 2 là shipper
            'email_verified_at' => now(),
            'remember_token' => null,
            'profile_photo_path' => null,
        ]);

        User::create([
            'name' => 'Trần Thị Shipper 2',
            'email' => 'shipper2@example.com',
            'phone' => '0123456790',
            'password' => Hash::make('password123'),
            'status' => 1,
            'work' => 0,
            'my_code' => 'SHIP002',
            'role' => 2,
            'email_verified_at' => now(),
            'remember_token' => null,
            'profile_photo_path' => null,
        ]);

        User::create([
            'name' => 'Lê Minh Shipper 3',
            'email' => 'shipper3@example.com',
            'phone' => '0123456791',
            'password' => Hash::make('password123'),
            'status' => 1,
            'work' => 1,    // Trạng thái công việc: 1 là có đơn
            'my_code' => 'SHIP003',
            'role' => 2,
            'email_verified_at' => now(),
            'remember_token' => null,
            'profile_photo_path' => null,
        ]);

        User::create([
            'name' => 'Phạm Thanh Shipper 4',
            'email' => 'shipper4@example.com',
            'phone' => '0123456792',
            'password' => Hash::make('password123'),
            'status' => 1,
            'work' => 0,
            'my_code' => 'SHIP004',
            'role' => 2,
            'email_verified_at' => now(),
            'remember_token' => null,
            'profile_photo_path' => null,
        ]);

        User::create([
            'name' => 'Đặng Thị Shipper 5',
            'email' => 'shipper5@example.com',
            'phone' => '0123456793',
            'password' => Hash::make('password123'),
            'status' => 1,
            'work' => 0,
            'my_code' => 'SHIP005',
            'role' => 2,
            'email_verified_at' => now(),
            'remember_token' => null,
            'profile_photo_path' => null,
        ]);
    }
}
