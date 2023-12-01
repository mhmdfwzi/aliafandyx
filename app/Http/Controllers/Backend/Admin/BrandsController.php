<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImageTrait;
use App\Models\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandsController extends Controller
{
    use UploadImageTrait;
    //


    public function __construct()
    {
        $this->authorizeResource(Brand::class);
    }

    public function index()
    {
        $brands = Brand::all();

        return view('backend.Admin_Dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.Admin_Dashboard.brands.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|file',
            'info' => 'nullable|string',
        ],[
            'name.required'=>'أسم الماركة مطلوب'
        ]);

        $data = $request->except('image');

        if($request->file('image')) {
            $data['image'] = $this->ProcessImage($request, 'image', 'brands');
        }

        Brand::create($data);


        return redirect()->route('admin.brands.index')->with('toast_success','Brand Created Successfully');
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('backend.Admin_Dashboard.brands.edit', compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|file',
            'info' => 'nullable|string',
        ]);

        $brand = Brand::findOrFail($id);

        $current_image = $brand->image;

        $data = $request->except('image');

        $new_image = $this->ProcessImage($request, 'image', 'brands',300,300, $current_image);

        if ($new_image) {
            $data['image'] = $new_image;
        }

        $brand->update($data);


        return redirect()->route('admin.brands.index')->with('toast_success','Brand Updated Successfully');
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('toast_success','Brand Deleted Successfully');

    }
}