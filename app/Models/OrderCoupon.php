<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCoupon extends Model
{
    use HasFactory;

    protected $table = 'order_coupons';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['order_id','coupon_id'];

    public function order(){
        $this->belongsTo(Order::class);
    }
}
