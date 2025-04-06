<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'voucher';
    protected $dates = ['deleted_at'];
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'voucher_user')
            ->withTimestamps()
            ->withPivot('used_at');
    }



}
