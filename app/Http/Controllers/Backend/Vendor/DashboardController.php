<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Order;
use App\Models\Store;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        $vendor = Vendor::where('id', Auth::user('vendor')->id)->first();
        $store = Store::where('id', $vendor->store_id)->first();
        $orders_count = Order::where('store_id',$store->id)->count();

        $attributes_count = Attribute::where('vendor_id',$vendor->id)->count();
        $attribute_values_count = AttributeValue::where('vendor_id',$vendor->id)->count();

        return view('backend.Vendor_Dashboard.dashboard.index',
        compact('orders_count','attributes_count','attribute_values_count'));
    }
}
