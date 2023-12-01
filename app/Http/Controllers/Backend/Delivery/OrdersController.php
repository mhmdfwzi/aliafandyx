<?php

namespace App\Http\Controllers\Backend\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //
    public function index()
    {
        $order_delivery = OrderDelivery::where('delivery_id', Auth::user('delivery')->id)->pluck('order_id');
        $orders = Order::whereIn('id', $order_delivery)->get();
        return view('backend.Delivery_Dashboard.orders.index', compact('orders'));
    }

    public function changeStatus($order_id , $status){
        // 'pending','processing','delivering','completed','cancelled','refunded'
        $order = Order::find($order_id);

        if($status == "pending"){            
                $order->status = "processing";
        }
        elseif($status == "processing"){
            $order->status = "delivering";
        }
        elseif($status == "delivering"){
            $order->status = "completed";
        }
        $order->save();

        return redirect()->route('delivery.orders.index')->with('toast_success','order status changed successfully');
        
    }

    
}