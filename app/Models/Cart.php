<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class Cart extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'cookie_id', 'user_id', 'product_id', 'quantity','measure','size','color'
    ];

    // Events (Observers)
    // Creating , created , updating , updated , saving , saved
    // deleting , deleted , restoring , restored  , retrieved

    // used to add observers to model
    protected static function booted()
    {
        static::observe(CartObserver::class); 
        // static::creating(function(Cart $cart){
        //     $cart->id = Str::uuid();
        // });

        static::addGlobalScope('cookie_id', function (Builder $builder) {
              $builder->where('cookie_id', '=', Cart::getCartSessionId());
        });
    }

    public static function getCartSessionId()
{
    $cartId = session('cart_id');

    if (!$cartId) {
        $cartId = Str::uuid();
        session(['cart_id' => $cartId]);
    }

    return $cartId;
}

    public static function regenerateCookieId()
{
    // Step 1: Forget the existing 'cart_id' cookie
    Cookie::queue(Cookie::forget('cart_id'));

    // Step 2: Generate a new 'cart_id'
    $newCartId = Str::uuid();

    // Step 3: Queue the new 'cart_id' cookie with the updated value
    Cookie::queue('cart_id', $newCartId, 30 * 24 * 60);

    // Return the new 'cart_id'
    return $newCartId;

    dd($newCartId);
}

        public static function removeCookieId()
    {
        
       // Step 1: Create an expired cookie instance with the same name
    $expiredCookie = Cookie::forget('cart_id');

    // Step 2: Add the expired cookie to the response to remove the existing cookie
    Cookie::queue($expiredCookie);

    // You can also unset the cookie variable in the current request
    // cookie()->forget('cart_id');

    // Now, if you check the cookie, it should be removed
    // dd(Cookie::get('cart_id'));
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'Anonymous']);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    
}