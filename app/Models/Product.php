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
        "drink_type",
    ];

    public function productSizePrice()
    {
        return $this->hasMany(ProductSizePrice::class);
    }

    public function productType(){
        return $this->belongsTo(ProductType::class);
    }

    public function invoices(){
        return $this->belongsTo(Invoice::class);
    }
}
