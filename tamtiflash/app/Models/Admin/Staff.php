<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = []; // Cho phép mass assignment
    public $timestamps = true; // Bảng có cột created_at và updated_at

    // Định nghĩa các cột có thể điền
    protected $fillable = ['name', 'email', 'password', 'phone', 'status', 'role', 'work'];
}
