<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "product_id",
        "size",
        "price",
    ];
}
