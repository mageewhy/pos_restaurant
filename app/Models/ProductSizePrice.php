<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductSizePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "size",
        "price",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
