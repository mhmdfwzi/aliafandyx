<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttributesController extends Controller
{
    //
    public function index()
    {
        $attributes = Attribute::all();

        return view('backend.Vendor_Dashboard.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('backend.Vendor_Dashboard.attributes.create');
    }

    public function show(Attribute $attribute)
    {
        return view('backend.Vendor_Dashboard.attributes.show',compact('attribute'));
    }


    public function store(Request $request)
    {
        // $request->validate();

        $data = $request->all();
        $data['vendor_id'] = Auth::user('vendor')->id; 

        Attribute::create($data);

        return redirect()->route('vendor.attributes.index');
    }


    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('backend.Vendor_Dashboard.attributes.edit', compact('attribute'));
    }
    public function update(Request $request, $id)
    {
        // $request->validated();

        $attribute = Attribute::findOrFail($id);

        $data = $request->all();
        $data['vendor_id'] = Auth::user('vendor')->id; 

        $attribute->update($data);


        return redirect()->route('vendor.attributes.index');
    }
    public function destroy()
    {
    }
}
