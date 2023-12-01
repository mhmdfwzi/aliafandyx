<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Http\Request;

class ProductPropertiesController extends Controller
{
    //
    public function index()
    {
        $product_properties = ProductProperty::all();
        return view('backend.Admin_Dashboard.product_properties.index', compact('product_properties'));
    }

    public function create()
    {
        $products = Product::all();
        return view('backend.Admin_Dashboard.product_properties.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id'=>'required',
            'name'=>'required',
            'value'=>'required',
        ]);
        // dd($data);
        ProductProperty::create($data);
        return redirect()->route('admin.product_properties.index')->with('toast_success','Product Property Created Successfully');



    }

    public function edit(Request $request, $id)
    {
        $products = Product::all();
        $product_property = ProductProperty::findOrFail($id);
        return view(
            'backend.Admin_Dashboard.product_properties.edit',
            compact('products', 'product_property')
        );
    }

    public function update(Request $request, $id)
    {
    }


}