<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    //
    public function index()
    {
        $attributes = Attribute::all();

        return view('backend.Admin_Dashboard.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('backend.Admin_Dashboard.attributes.create');
    }

    public function show(Attribute $attribute)
    {
        return view('backend.Admin_Dashboard.attributes.show',compact('attribute'));
    }


    public function store(Request $request)
    {
        // $request->validate();

        $data = $request->all();

        Attribute::create($data);

        return redirect()->route('admin.attributes.index');
    }


    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('backend.Admin_Dashboard.attributes.edit', compact('attribute'));
    }
    public function update(Request $request, $id)
    {
        // $request->validated();

        $attribute = Attribute::findOrFail($id);

        $data = $request->all();

        $attribute->update($data);


        return redirect()->route('admin.attributes.index');
    }
    public function destroy()
    {
    }
}
