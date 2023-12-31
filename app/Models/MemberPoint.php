<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'point',
    ];

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }
}
