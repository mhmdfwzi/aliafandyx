<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
class DeduceProductQuantity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {

        // get order object
        $order = $event->order;

        try {
            // forloop on all products on order 
            foreach ($order->products as $product) {
                // decrement product quantity based on quantity of product on order
                $product->decrement('quantity',$product->order_item->quantity);
             }
     
        } catch (\Throwable $th) {
            //throw $th;
        }
        

        ////// another way

        // foreach (Cart::get() as $item) {
        //     Product::where('id','=',$item->product_id)
        //     ->update([
        //         'quantity' => DB::raw("quantity - {$item->quantity}")
        //     ]);
        // }
    }
}
