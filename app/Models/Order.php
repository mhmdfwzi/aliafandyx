<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id', 'user_id', 'payment_method', 'status', 'status_method','coupon_id','total','cart_id'
    ];

    protected static function booted()
    {

        // while creating order make order number take next available number
        static::creating(function (Order $order) {
            //20230001 - 20230002
            $order->number = Order::getNextOrderNumber();
        });
    }


    public static function getNextOrderNumber()
    {
        // SELECT MAX(number) FROM orders
        $year = Carbon::now()->year;
        $number = Order::whereYear('created_at', $year)->max('number');

        // if there is number in this year add 1 to this number
        if ($number) {
            return $number + 1;
        }
        // if not return 0001
        return $year . '0001';
    }


    public function products()
    {

        return $this->belongsToMany(
            Product::class,
            'order_items',
            'order_id',
            'product_id',
            'id',
            'id'
        )
        // pivot model
        ->using(OrderItem::class)
        // called pivot table
        ->as('order_item')
        // retrieve this pivot table columns not only foreign keys
        ->withPivot(['product_name','quantity','price','options','size','color','measure']);
    }

    public function variants()
    {

        return $this->belongsToMany(
            ProductVariant::class,
            'order_items',
            'size',
            'color',
            'order_id',
            'variant_id',
            'id',
            'id'
        )
        // pivot model
        ->using(OrderItem::class)
        // called pivot table
        ->as('order_item')
        // retrieve this pivot table columns not only foreign keys
        ->withPivot(['product_name','quantity','price','options']);
    }

    // one-to-many relationship
    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

    // one-to-one relationship => one Order has one OrderAddress (billing)
    public function billingAddress()
    {
        return $this->hasOne(OrderAddress::class, 'order_id', 'id')->where('type', '=', 'billing');
    }
    // one-to-one relationship => one Order has one OrderAddress (shipping)
    public function shippingAddress()
    {
        return $this->hasOne(OrderAddress::class, 'order_id', 'id')->where('type', '=', 'shipping');
    }


    // one-to-one relationship => Order Belong to one Store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}