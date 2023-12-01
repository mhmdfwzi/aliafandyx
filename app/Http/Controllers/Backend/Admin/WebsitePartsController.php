<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImageTrait;
use App\Models\WebsiteParts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsitePartsController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $WebsiteParts = WebsiteParts::all();


        return view('backend.Admin_Dashboard.website_parts.index',compact('WebsiteParts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.Admin_Dashboard.website_parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('image');
        
        if($request->file('image')){
            $data['image'] = $this->uploadImage($request, 'image', 'website_part');
        }

        WebsiteParts::create($data);

        return redirect()->route('admin.websiteParts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $websitePart= WebsiteParts::findOrFail($id);
        return view('backend.Admin_Dashboard.website_parts.edit', compact('websitePart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $WebsitePart= WebsiteParts::findOrFail($id);

        // $data = $request->all();

        $old_image = $WebsitePart->image;

        $data = $request->except('image');

        $new_image = $this->uploadImage($request, 'image', 'website_part');

        if ($new_image) {
            $data['image'] = $new_image;
        }

        $WebsitePart->update($data);

        // isset => Determine if a variable is declared and is different than NULL
        if ($old_image && $new_image) {
            // Storage::disk('disk_name')->delete('image_path');
            Storage::disk('uploads')->delete($old_image);
        }

        // $WebsitePart->update($data);

        return redirect()->route('admin.websiteParts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
