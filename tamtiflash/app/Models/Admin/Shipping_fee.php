<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_fee extends Model
{
    use HasFactory;
    protected $table = 'shipping_fee';
    protected $fillable = ['min_distance', 'max_distance', 'base_price', 'extra_price_per_km'];
    public $timestamps = false;
}
