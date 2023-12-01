<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Events\OrderToDelivery;
use App\Listeners\DeduceProductQuantity;
use App\Listeners\EmptyCart;
use App\Listeners\SendOrderCreatedNotification;
use App\Listeners\SendOrderToDelivery;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        
        // Event => OrderCreated
        // Listeners => DeduceProductQuantity , SendOrderCreatedNotification , EmptyCart
        
        OrderCreated::class => [
            DeduceProductQuantity::class,
            EmptyCart::class,
            SendOrderCreatedNotification::class,
            
        ],

        OrderToDelivery::class => [
            SendOrderToDelivery::class
        ],



        ////// another way 
            // 'order.created'=>[
            //     DeduceProductQuantity::class,
            //     SendOrderCreatedNotification::class,
            //     EmptyCart::class
            // ],
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
