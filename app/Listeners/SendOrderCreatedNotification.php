<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Http\Traits\SendWhatsappMessage;
use App\Models\Admin;
use App\Models\Vendor;

use App\Notifications\OrderCreatedNotification;

use Illuminate\Support\Facades\Notification;

class SendOrderCreatedNotification
{
    use SendWhatsAppMessage;
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
         // a php issue how send email and this is it's solution
        ini_set('max_execution_time', 300);
        
        /// send notification to vendor of product and all admins
        
        
        // get order
        $order = $event->order;

        // get store vendor of the order item
        $vendor = Vendor::where('store_id', '=', $order->store_id)->first();
        // get all admins
        $admins = Admin::all();
        
        //// if we want send notification to many users
        // $users = User::where('store_id','=',$order->store_id)->get();
        // Notification::send($users , new OrderCreatedNotification($order));

        //// send notification to specific admin
        // $admin->notify(new OrderCreatedNotification($order));
        $delivery_admin = Admin::whereHas('roles', function ($query) {
            $query->where('name', 'Delivery Admin');
        })->first();         

        
        // send notifications to all admins
        Notification::send($admins, new OrderCreatedNotification($order));
        
        
        
        if ($vendor) {
             // send notification to store vendor 
            $vendor->notify(new OrderCreatedNotification($order));

            // send whatsapp message to vendor 
			$message = 'aliafandy';
            $message .= ' اوردر تجريبى : ' . $order->number . "\n";
            $message .=  'أسم المحل: ' . $order->store->name . "\n";
            //$message .=  $delivery_admin->phone_number  ."\n";
            $this->sendMessage('+2'.$vendor->phone , $message);


            if($delivery_admin){
                $this->sendMessage('+2'.$delivery_admin->phone_number , $message);
            }
            
        }

        

        

    }
}