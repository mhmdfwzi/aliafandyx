<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{
    //
    public function index()
    {
        $deliveries = Delivery::all();
        return view('backend.Admin_Dashboard.delivery.index', compact('deliveries'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.Admin_Dashboard.delivery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data= $request->all();

        $data['password'] = Hash::make($request->password);
        // dd($data);
        Delivery::create($data);

        return redirect()->route('admin.deliveries.index');

    }

    public function edit($id)
    {
        $categories = Category::all();
        $delivery = Delivery::findorfail($id);
        return view('backend.Admin_Dashboard.delivery.edit', compact('delivery', 'categories'));

    }
    public function update(Request $request, $id)
    {
        $delivery = Delivery::findorfail($id);
        $data = $request->all();
        $data['password'] = $request->password ? Hash::make($request->password) : $delivery->password ;
        $delivery->update($data);
        return redirect()->route('admin.deliveries.index');
    }
}
