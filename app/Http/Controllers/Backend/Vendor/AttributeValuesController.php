<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttributeValuesController extends Controller
{
    //
    public function index()
    {

        $attribute_values = AttributeValue::all();
        return view('backend.Vendor_Dashboard.attribute_values.index', compact('attribute_values'));
    }

    public function create()
    {

        $attributes = Attribute::all();
        return view('backend.Vendor_Dashboard.attribute_values.create', compact('attributes'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = Auth::user('vendor')->id;
       // dd($data);
        AttributeValue::create($data);

        return redirect()->route('vendor.attribute_values.index')->with('success', 'Attribute Value Inserted Successfully');
    }
    public function edit($id)
    {
        $attributes = Attribute::all();
        $attribute_value = AttributeValue::findOrFail($id);
        return view(
            'backend.Vendor_Dashboard.attribute_values.edit',
            compact('attributes', 'attribute_value')
        );
    }
    public function update(Request $request, $id)
    {
        $attribute_value = AttributeValue::findOrFail($id);
        $data = $request->all();
        $data['vendor_id'] = Auth::user('vendor')->id;
        $attribute_value->update($data);
        return redirect()->route('vendor.attribute_values.index')->with('success', 'Attribute Value Updated Successfully');
    }
    public function destroy()
    {
    }
}
