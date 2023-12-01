<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'code',
        'description',
        'discount_amount',
        'discount_percentage',
        'status',
        'expiration_date',
        'usage_limit',
        'usage_count',
        'store_id'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
