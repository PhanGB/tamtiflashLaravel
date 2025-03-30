<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $fillable = [
        'name',
        'code',
        'value',
        'max_value',
        'start_date',
        'end_date',
        'quantity',
        'status',
        'created_at',
        'updated_at',
    ];
}
