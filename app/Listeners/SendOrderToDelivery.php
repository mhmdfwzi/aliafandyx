<?php

namespace App\Listeners;

use App\Events\OrderToDelivery;
use App\Http\Traits\SendWhatsappMessage;
use App\Models\Delivery;
use App\Models\OrderDelivery;
use App\Notifications\OrderCreatedNotification;

class SendOrderToDelivery
{
    use SendWhatsappMessage;
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
    public function handle($event)
    {
        //
        //// get order
        $order = $event->order;
        $order_delivery = OrderDelivery::where('order_id', $order->id)->first();
        $delivery = Delivery::where('id', $order_delivery->delivery_id)->first();
        if ($delivery) {
            $delivery->notify(new OrderCreatedNotification($order));

            $message = 'تم طلب أوردر رقم : ' . $order->number . "\n";
            $message .=  'أسم المحل: ' . $order->store->name . "\n";
            $message .=  'عنوان العميل : ' . $order->billingAddress->street_address . "\n";
            
            $this->sendMessage('+2'.$delivery->phone_number, $message);

            
        }


    }
}