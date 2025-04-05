<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail'; // Tên bảng trong cơ sở dữ liệu
    public $timestamps = false;

    // Các thuộc tính có thể gán đại trà
    protected $fillable = [
        'unit_price',
        'quantity',
        'id_order',
        'id_product',
    ];

    // Định nghĩa quan hệ nếu cần
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
