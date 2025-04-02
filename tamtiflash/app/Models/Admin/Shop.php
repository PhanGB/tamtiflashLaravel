<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'shops';
    protected $fillable = [
        'name',
        'rate',
        'short_description',
        'time_open',
        'time_close',
        'address',
        'status',
    ];
}
