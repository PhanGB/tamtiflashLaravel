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
        return $this->hasMany(OrderDetail::class, 'id_order');
    }

    // Accessor cho payment_method
    public function getPaymentMethodNameAttribute()
    {
        switch ($this->payment_method) {
            case 'cod':
                return 'Thanh toán khi nhận hàng';
            case 'bank_transfer':
                return 'Chuyển khoản ngân hàng';
            default:
                return 'Không xác định';
        }
    }

    // Accessor cho status
    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Chưa nhận';
            case 1:
                return 'Đang giao hàng';
            case 2:
                return 'Đã hoàn thành';
            default:
                return 'Không xác định';
        }
    }

    // Accessor cho style của status
    public function getStatusStyleAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'color: red; font-weight: bold;';
            case 2:
                return 'color: green; font-weight: bold;';
            default:
                return 'color: orange; font-weight: bold;';
        }
    }
}
