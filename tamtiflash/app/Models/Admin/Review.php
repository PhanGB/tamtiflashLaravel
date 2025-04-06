<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';

    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
        'rate',
    ];

    public function scopeComplaints($query)
    {
        return $query->where('rate', '<=', 3);
    }

    public function scopeGoodReviews($query)
    {
        return $query->where('rate', '>', 3)->where('rate', '<=', 5);
    }
}
