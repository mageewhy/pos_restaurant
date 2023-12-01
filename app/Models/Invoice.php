<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'quantity',
    ];

    public function member(){
        $this->hasOne(MemberPoint::class, 'member_point_id');
    }
}
