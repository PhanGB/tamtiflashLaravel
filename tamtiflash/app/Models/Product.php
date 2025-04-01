<?php

namespace App\Models;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'status',
        'price',
        'status',
        'id_shop',
        'id_cate'
    ];

    // Một sản phẩm thuộc về một shop
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'id_shop');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'id_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_cate');
    }


}

