<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product_variant';

    protected $fillable = ['name', 'price', 'status','id_product', 'color', 'size', 'price', 'stock'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
