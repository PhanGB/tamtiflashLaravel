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
        'note'
    ];

    protected $attributes = [
        'status' => 0,
    ];

    // Khai báo lại timestamps để Laravel hiểu
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
