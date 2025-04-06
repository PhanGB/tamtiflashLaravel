<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'voucher_user')
            ->withTimestamps()
            ->withPivot('used_at');
    }

}