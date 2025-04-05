<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';  // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'role',
        'work',
    ];

    // Mã hóa password trước khi lưu vào cơ sở dữ liệu
    protected $hidden = [
        'password',
    ];

    // Đảm bảo khi tạo mới, các trường thời gian được tự động điền
    public $timestamps = true;
}
