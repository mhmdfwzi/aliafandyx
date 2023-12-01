<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    //
    public function index()
    {//
        $vendors = Vendor::oldest()->get();
        return view('backend.Admin_Dashboard.vendors.index', compact('vendors'));
    }
    public function create()
    {
        $stores= Store::all();
        return view('backend.Admin_Dashboard.vendors.create',compact('stores'));
    }
    public function store(Request $request )
    {
            $request->validate([
                'name' => 'required',
                'store_id' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'nullable',
                ]);

                $data = $request->except('password');
                $data['password'] = Hash::make($request->password); 
                $vendor = Vendor::create($data);
                return redirect()->route('admin.vendors.index');
    }
    public function show()
    {
    }
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        $stores= Store::all();
        return view('backend.Admin_Dashboard.vendors.edit', compact('vendor', 'stores'));

    }
    public function update($id , Request $request)
    {
        $request->validate([
            'name' => 'required',
            'store_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'nullable',
            ]);

            $data = $request->except('password');
            $data['password'] = Hash::make($request->password); 
            $vendor = Vendor::findOrFail($id);
            $vendor->update($data);
            return redirect()->route('admin.vendors.index');

    }
    public function destroy()
    {
    }
}
