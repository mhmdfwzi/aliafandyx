<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Events\OrderToDelivery;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class,'order');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $deliveries = Delivery::all();
        $orders = Order::with('user', 'store', 'products.category')->get();
        $groupedOrders = $orders->groupBy('cart_id');

        return view('backend.Admin_Dashboard.orders.index', compact('orders', 'deliveries','groupedOrders'));
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

        return redirect()->route('admin.reports.orders')->with('toast_success','order status changed successfully');
        
    }



    public function assignDelivery(Request $request)
    {
        // $data = $request->all();
        $orders = Order::where('cart_id', $request->cart_id)->get();

        
        foreach($orders as $order){
            
            $data['order_id'] = $order->id;
            $data['cart_id'] = $request->cart_id;
            $data['delivery_id'] = $request->delivery_id;
            OrderDelivery::create($data);

            event(new OrderToDelivery($order));

        }
        

        return redirect()->route('admin.orders.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $stores = Store::all();
        return view('backend.Admin_Dashboard.orders.create', compact('users', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        $users = User::all();
        $stores = Store::all();
        return view('backend.Admin_Dashboard.orders.edit', compact('order', 'users', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        $order = Order::findOrFail($id);
        $order->store_id = $request->store_id;
        $order->user_id = $request->user_id;
        $order->number = $request->number;
        $order->payment_method = $request->payment_method;
        $order->status = $request->status;
        $order->payment_status = $request->payment_status;
        $order->shipping = $request->shipping;
        $order->tax = $request->tax;
        $order->coupon_id = $request->coupon_id;
        $order->total = $request->total;
        $order->save();

        return redirect()->route('admin.orders.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}