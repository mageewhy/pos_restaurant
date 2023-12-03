<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'product',
        'sub_total',
        'vat',
        'grand_total_usd',
        'grand_total_khr',
        'member_point_id'
    ];

    public function member(){
        return $this->belongsTo(MemberPoint::class, 'member_point_id');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
