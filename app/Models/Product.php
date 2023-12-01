<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "prod_id",
        "name",
        "product_type_id",
        "detail",
        "image",
    ];

    public function productSizePrice()
    {
        return $this->hasMany(ProductSizePrice::class);
    }
}
