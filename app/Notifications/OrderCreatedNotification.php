<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        //
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        // channels the notification will send by
        return ['database','broadcast'];

        $channels = ['database'];
        if($notifiable->notification_prefernces['order_created']['sms'] ?? false) {
            $channels[] = 'vonage';
        }
        if($notifiable->notification_prefernces['order_created']['mail'] ?? false) {
            $channels[] = 'mail';
        }
        if($notifiable->notification_prefernces['order_created']['broadcast'] ?? false) {
            $channels[] = 'broadcast';
        }
        return $channels;

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $address = $this->order->billingAddreess;
        return (new MailMessage())
                    ->subject("New Order #{$this->order->number}")
                    ->from('support@aliafandy.com', 'aliafandy')
                    ->greeting("Hi {$notifiable->name}")
                    ->line("A new Order (#{$this->order->number} Created by {$address->name}   )")
                    ->action('View Order', url('/checkout'))
                    ->line('Thank you for using our application!');
    }


    // configurations for database channel
    public function toDatabase($notifiable)
    {
        $address = $this->order->billingAddreess;
        $orderStoreId = $this->order->store_id;
        // $vendor = Vendor::where('store_id', $orderStoreId)->first();
        // $notifiable = $this->notifiable;

        if ($notifiable instanceof \App\Models\Admin) {
            $url = url('/admin/dashboard');
        } elseif ($notifiable instanceof \App\Models\Vendor) {
            $url = url('/vendor/dashboard');
        }elseif ($notifiable instanceof \App\Models\Delivery) {
            $url = url('/delivery/dashboard');
        } else {
            $url = '';
        }

        return [
            'body' => "A new Order #{$this->order->number}",
            'icon' => 'fas fa-file',
            'url' => $url,
            'order_id' => $this->order->id
        ];
    }

    public function toBroadcast($notifiable)
    {
        $address = $this->order->billingAddreess;
        return new BroadcastMessage([
            'body' => "A new Order #{$this->order->number} ",
            'icon'=>'fas fa-file',
            'url'=>url('/backend/dashboard'),
            'order_id'=>$this->order->id
        ]);
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}