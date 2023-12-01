<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //
    public function index($status = null)
    {
        //
        $deliveries = Delivery::all();
        $orders = Order::with('user', 'store', 'products.category')->get();

        if ($status != null) {
            $orders = Order::where('status', $status)->with('user', 'store', 'products.category')->get();
        }



        return view('backend.Admin_Dashboard.reportes.orders_report', compact('orders', 'deliveries', 'status'));
    }

}