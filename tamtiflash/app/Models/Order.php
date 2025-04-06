<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'id_user',
        'status',
        'total',
        'create_at',
        'update_at',
        'shipping_fee',
        'payment_method',
        'note',
        'id_driver'
    ];

    protected $attributes = [
        'status' => 0,
    ];

    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

     // Định nghĩa quan hệ nếu cần
     public function user()
     {
         return $this->belongsTo(User::class, 'id_user');
     }

     public function admin()
     {
         return $this->belongsTo(Admin::class, 'id_driver');
     }

        public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_order'); // Sửa cột khóa ngoại
    }
}