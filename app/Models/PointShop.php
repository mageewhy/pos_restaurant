<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointShop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'point',
        'image'
    ];
}
