<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //

    public function index()
    {

        $coupons = Coupon::all();

        return view('backend.Admin_Dashboard.coupons.index', compact('coupons'));
    }

    public function show()
    {
    }

    public function create()
    {
        $stores = Store::all();
        return view('backend.Admin_Dashboard.coupons.create', compact('stores'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Coupon::create($data);
        return redirect()->route('admin.coupons.index');
    }

    public function edit($id)
    {
        $stores = Store::all();
        $coupon = Coupon::findorfail($id);
        return view('backend.Admin_Dashboard.coupons.Edit', compact('coupon', 'stores'));
    }

    public function update(Request $request ,$id )
    {
        $data = $request->all();
        $coupon = Coupon::findorfail($id);
        $coupon->update($data);
        return redirect()->route('admin.coupons.index');
    }

    public function destroy()
    {
    }
}
