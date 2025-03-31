<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banking extends Model
{
    protected $table = 'banking';
    protected $fillable = ['name_bank', 'acc_number', 'name', 'qr_img'];
    public $timestamps = false;
}
