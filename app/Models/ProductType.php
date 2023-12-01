<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "type",
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
