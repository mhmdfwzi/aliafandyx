<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Events\OrderToDelivery;
use App\Http\Controllers\Controller;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $vendor_id = Auth::user('vendor')->id;
        $orders = Order::where('vendor_id',$vendor_id)->with('user', 'store', 'products.category')->get();
        return view('backend.Vendor_Dashboard.orders.index', compact('orders'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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