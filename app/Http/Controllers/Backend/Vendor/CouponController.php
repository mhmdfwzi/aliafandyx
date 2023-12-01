<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCouponRequest;
use App\Http\Requests\Backend\UpdateCouponRequest;
use App\Models\Coupon;
use App\Models\Store;

class CouponController extends Controller
{
    //

    public function __construct()
    {
        // $this->authorizeResource(Coupon::class,'coupon');
    }

    public function index()
    {

        $coupons = Coupon::all();

        return view('backend.Vendor_Dashboard.coupons.index', compact('coupons'));
    }

    public function show()
    {
    }
 
    public function create()
    {
        $stores = Store::all();
        return view('backend.Vendor_Dashboard.coupons.create', compact('stores'));
    }

    public function store(StoreCouponRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();
        Coupon::create($validatedData);
        return redirect()->route('vendor.coupons.index')->with('toast_success','Coupon Created Successfully');
    }

    public function edit($id)
    {
        $stores = Store::all();
        $coupon = Coupon::findOrFail($id);
        return view('backend.Vendor_Dashboard.coupons.Edit', compact('coupon', 'stores'));
    }

    public function update(UpdateCouponRequest $request ,$id )
    {
        // Validate the request data
        $validatedData = $request->validated();
        $coupon = Coupon::findOrFail($id);
        $coupon->update($validatedData);
        return redirect()->route('vendor.coupons.index')->with('toast_success','Coupon Updated Successfully');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('vendor.coupons.index');

    }
}